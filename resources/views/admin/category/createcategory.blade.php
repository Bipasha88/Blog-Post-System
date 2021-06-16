@extends('admin.layouts._main')


@section('title', 'Create Category')
@section('content')

        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-7">
                    <div class="p-5">

                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create a Category!</h1>
                        </div>
                        @if(count($errors) > 0 )
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul class="p-0 m-0" style="list-style: none;">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="user" action="{{ Route('category_post') }}" method="post">
                            @csrf
                            <div class="form-group">

                                <input type="text" class="form-control " id="exampleFirstName"
                                       name="name" value="{{ old('name') }}" required autofocus
                                       placeholder="Name">

                            </div>


                            <div class="form-group">

                                <select  class="form-select form-control"
                                         aria-label="Default select example"
                                         name="status" value="{{ old('status') }}" required autofocus>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>


                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Create
                            </button>


                        </form>

                    </div>
                </div>
            </div>
        </div>


@endsection
