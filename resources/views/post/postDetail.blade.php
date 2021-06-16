@extends('post.layouts._default')

@section('title', 'Posts')

@section('content')


<div class="row">
    <div class=" col-md-12 ">
        <div class="card">
            <div class=" ripple" data-mdb-ripple-color="light">
                <img src="{{asset('images/' . $post->img)}}" class="img-fluid" />
                <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <div class="text-muted">
                    <p>Created By : {{\App\Models\User::where('id',$post->user_id)->first()->name}}   </p>
                    <p>Posted at : {{$post->created_at}}</p>

                </div>

                <div class="row">
                    @foreach($tags as $tag)
                    <div class="col-md-1">

                            <a href="{{route('tagposts',['id'=>$tag->id])}}">{{$tag->name}}</a>

                    </div>
                    @endforeach

                </div>

                <div class="">
                    <p class="card-text">
                        {!! $post->body !!}
                    </p>
                </div>




            </div>
        </div>
    </div>
</div>

<br>
<br>
<div class="row">

    <div class="col-lg-7">
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

            <form class="user" method="post" action="{{route('comment-post',['id' => $post->id])}}">
                @csrf
                <div class="form-group">

                    <input type="text" class="form-control " id="exampleFirstName"
                           placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>

                </div>
                <br>
                <div class="form-group" >

                    <input type="text" class="form-control " id="exampleFirstName"
                           placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>

                </div>
                <br>
                <div class="form-group">
                            <textarea type="text" class="form-control " id="exampleInputEmail"
                                      placeholder="Comment" name="body" value="{{ old('body') }}" required autofocus></textarea>
                </div>
                <br>
                <div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Comment
                </button>
                </div>


            </form>


        </div>
    </div>

<br>
<div class="row">
    <h5 class="card-title">Comments</h5>
    @foreach($comments as $comment)
        @if($comment->status=='active')

    <b><p>{{$comment->name}}</p></b>
    <p class="card-text">
        {{$comment->body}}
    </p>
        @endif
    @endforeach
</div >

</div>

@endsection
