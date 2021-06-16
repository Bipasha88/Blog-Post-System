@extends('post.layouts._default')

@section('title', 'Posts')



@section('content')


    <section class="text-center">
        <p class="mb-2"><strong>Category</strong></p>
        <hr>
        <div class="row">
            @foreach($categories as $category)
        <div class="col-md-1">

                <a href="{{route('categoryposts',['id'=>$category->id])}}">{{$category->name}}</a>

        </div>
            @endforeach

                <div class="col-md-1 text-decoration-underline">
                    <a href="{{route('category-list')}}">See all</a>
                </div>
        </div>

        <br>
        <h4 class="mb-5"><strong>Latest posts</strong></h4>

        <div class="row">

            @foreach($posts as $post)

            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="{{asset('images/' . $post->img)}}" class="img-fluid"  alt=""/>

                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">
                            {!! \Illuminate\Support\Str::of($post->body)->words(12) !!}
                        </p>
                        <a href="{{route('single-post',['id' => $post->id])}}" class="btn btn-primary">Read</a>
                    </div>
                </div>
            </div>
            @endforeach



        </div>


    </section>

    <div>
        {{$posts->links('paginationLinks')}}
    </div>




@endsection
