<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    //

    public function userRequest()
    {

        if (! Gate::allows('userRequest')) {
            abort(403);
        }

        $model = resolve('App\ViewModels\User\Admin\UserRequestModel');

        $model->load();

        $users = $model->getUser();

        return view('admin.dashboard.user',compact( 'users') );
    }

    public function accept(Request $request){

        $model = resolve('App\ViewModels\User\Admin\AcceptUserModel');

        $model->load($request->users_id);

        return redirect()->back();
    }

    public function delete(Request $request){

        $model = resolve('App\ViewModels\User\Admin\DeleteUserModel');

        $model->load($request->users_id);

        return redirect()->back();
    }
}
