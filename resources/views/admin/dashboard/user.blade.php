@extends('admin.layouts._main')

@section('title', 'User')

@section('styles')
    <link href="/theme/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Page Html Goes Here -->

        <div class="container-fluid">

            <div id="content">

            <div class="container-fluid">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">User Request</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($users as $user)

                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->status}}</td>
                                    <td>
                                            <button type="submit" class="btn btn-primary" data-userid="{{ $user->id }}"
                                                    data-toggle="modal" data-target="#acceptModal">Accept</button>

                                            <button type="submit" class="btn btn-danger " data-userid="{{ $user->id }}"
                                                    data-toggle="modal" data-target="#deleteModal">Delete</button>

                                    </td>
                                </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </div>
    <!-- Accept Modal-->
    <div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Accept Request</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>


                    <form action="{{ Route('accept') }}" method="post">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="modal-body">
                            <p>Select "Accept" below if you are ready to accept the current user request.</p>
                            <input type="hidden" name="users_id" id="user_id" value="">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Accept</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>

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

                    <form action="{{ Route('user-delete') }}" method="post">
                        @csrf
                        {{method_field('PUT')}}

                        <div class="modal-body">
                            <p>Select "Delete" below if you are ready to delete the current user request.</p>
                            <input type="hidden" name="users_id" id="user_id" value="">
                        </div>

                        <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>

@endsection
            @section('scripts')
                <!-- Page level plugins -->
                    <script src="/theme/vendor/datatables/jquery.dataTables.min.js"></script>
                    <script src="/theme/vendor/datatables/dataTables.bootstrap4.min.js"></script>

                    <!-- Page level custom scripts -->
                    <script src="/theme/js/demo/datatables-demo.js"></script>

                <script>
                    $('#acceptModal').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget)
                        var user_id = button.data('userid')
                        var modal = $(this)
                        modal.find('.modal-body #user_id').val(user_id);
                    })

                </script>

                <script>
                    $('#deleteModal').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget)
                        var user_id = button.data('userid')
                        var modal = $(this)
                        modal.find('.modal-body #user_id').val(user_id);
                    })

                </script>
@endsection
