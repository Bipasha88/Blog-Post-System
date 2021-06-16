

@extends('admin.layouts._main')


@section('title', 'Create Post')

@section('styles')
    <link href="/theme/css/select2.min.css" rel="stylesheet">


@endsection
@section('content')


    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create a Post!</h1>
                    </div>
                    <form class="user" action="{{ Route('create_post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">

                                <input type="text" class="form-control "
                                       placeholder="Title" name="title" value="{{ old('title') }}" required autofocus>

                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control body"
                                      placeholder="Post" name="body" value="{{ old('body') }}" ></textarea>
                        </div>
                        <div class="form-group form-control">
                            <label>Image</label>

                            <input type="file" class=" "  name="img" value="{{ old('img') }}" required autofocus
                                   placeholder="Image">

                        </div>
                        <div class="form-group">

                            <label>Category</label>
                                <select  class="form-select form-control"
                                         aria-label="Default select example" name="category" value="{{ old('category') }}" required autofocus>
                                    @foreach($categories as $category)
                                    <option>{{$category->name}}</option>
                                    @endforeach
                                </select>


                        </div>

                        <div class="form-group">

                            <select  class="form-select form-control tag"
                                     aria-label="Default select example" name="tags[]" multiple="multiple"
                                     value="{{ old('tag') }}" required autofocus >
                                @foreach($tags as $tag)
                                    <option value="{{$tag->name}}">{{$tag->name}}</option>
                                @endforeach
                            </select>


                        </div>

                        <div class="form-group">

                            <select  class="form-select form-control"
                                     aria-label="Default select example" name="status" value="{{ old('status') }}" required autofocus >
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
@section('scripts')


    <script src="/theme/js/select2.min.js"></script>

    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    <script>

        $(document).ready(function() {
            $('.tag').select2({
                placeholder: "Tags",
                tags: true,
                tokenSeparators: [',', ' ']
            })
        });
        tinymce.init({
            selector:'textarea.body',
            height: 300
        });

    </script>
@endsection
