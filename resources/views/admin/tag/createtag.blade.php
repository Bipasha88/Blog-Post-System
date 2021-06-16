@extends('admin.layouts._main')


@section('title', 'Create Category')
@section('content')

    <div class="card-body p-0">            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create a Tag!</h1>
                        </div>
                        <form class="user" action="{{ Route('tag_post') }}" method="post">
                            @csrf
                            <div class="form-group">

                                <input type="text" class="form-control " id="exampleFirstName"
                                       name="name" value="{{ old('name') }}" required autofocus
                                       placeholder="Name">

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
