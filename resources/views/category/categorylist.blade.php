@extends('post.layouts._default')

@section('title', 'Category')

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
        </div>
    </section>
@endsection
