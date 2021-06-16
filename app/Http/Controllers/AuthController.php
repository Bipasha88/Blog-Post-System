<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register_post(UserRequest $request)
    {
        $data = $request->all();

        $model = resolve('App\ViewModels\Auth\AuthModel');

        $model->register($data);

        return redirect()->route('login');
    }

    public function login_post(Request $request)
    {
        $data = $request->all();
        $credentials = ['email' => $request->email, 'password' => $request->password, 'status' => 'active'];
        $remember = $request->input('remember');

        $model = resolve('App\ViewModels\Auth\AuthModel');
        $User = $model->getUser($data);

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        if ($User['status']=='reject') {
            return redirect()->back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors(['invalid' => 'Your Request is Rejected']);
        }
        elseif ($User['status']=='pending') {
            return redirect()->back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors(['invalid' => 'Your Request is Pending']);
        } else {

            return back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors(['invalid' => 'Wrong Email or Password']);


        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }



}
