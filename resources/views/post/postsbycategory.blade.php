@extends('post.layouts._default')

@section('title', 'Posts')

@section('content')

    <div class="row">

        <div class="col-md-10">
            <h4 class="mb-5"><strong>{{\App\Models\Category::where('id',$id)->first()->name}}</strong></h4>
        </div>
    </div>

    <section class="text-center">
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
