@extends('admin.layouts._main')

@section('title', 'All Tags')

@section('styles')
    <link href="/theme/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">

        <div id="content">

            <div class="container-fluid">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tag List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>

                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{$tag->name}}</td>

                                        <td>
                                            <button type="submit" class="btn btn-danger btn-sm" data-tagid="{{ $tag->id }}"
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

                                                <form action="{{ Route('tag-delete') }}" method="get">

                                                    <div class="modal-body">
                                                        <p>Select "Delete" below if you are ready to delete the current tag.</p>
                                                        <input type="hidden" name="tags_id" id="tag_id" value="">
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
                                {{$tags->links('paginationLinks')}}
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
            var tag_id = button.data('tagid')
            var modal = $(this)
            modal.find('.modal-body #tag_id').val(tag_id);
        })

    </script>


@endsection
