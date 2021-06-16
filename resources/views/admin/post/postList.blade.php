@extends('admin.layouts._main')

@section('title', 'All Posts')

@section('styles')

@endsection

@section('content')
    <div class="container-fluid">

        <div id="content">

            <div class="container-fluid">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Post List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Detail</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Detail</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->title}}</td>
                                            <td>{{\App\Models\User::where('id',$post->user_id)->first()->name}}</td>
                                            <td>{!!  \Illuminate\Support\Str::of($post->body)->words(6) !!}</td>
                                            <td>
                                                <img src="{{asset('images/' . $post->img)}}" style="height: 60px; width: 90px" class="img-fluid"  alt=""/>
                                            </td>
                                            <td>{{$post->status}}</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="{{ route('edit',['id'=>$post->id]) }}">Edit</a>

                                                <button type="submit" class="btn btn-danger btn-sm" data-postid="{{ $post->id }}"
                                                        data-toggle="modal" data-target="#deleteModal">Delete</button>
                                            </td>
                                        </tr>


                                        <!-- Delete Modal-->
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Request</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>

                                                    <form action="{{route('delete')}}" method="get">

                                                            <div class="modal-body">
                                                                <p>Select "Delete" below if you are ready to delete the current post.</p>
                                                                <input type="hidden" name="posts_id" id="post_id" value="">
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </form>

                                                </div>
                                            </div>
                                        </div>

                                @endforeach

                                </tbody>
                            </table>
                            <div>
                                {{$posts->links('paginationLinks')}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


@endsection

@section('scripts')
    <!-- Page level plugins -->


    <!-- Page level custom scripts -->
    <script src="/theme/js/demo/datatables-demo.js"></script>

    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var post_id = button.data('postid')
            var modal = $(this)
            modal.find('.modal-body #post_id').val(post_id);
        })

    </script>
@endsection
