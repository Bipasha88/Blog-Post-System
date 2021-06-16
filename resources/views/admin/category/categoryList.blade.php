@extends('admin.layouts._main')

@section('title', 'All Categories')

@section('styles')

@endsection

@section('content')
    <div class="container-fluid">

        <div id="content">

            <div class="container-fluid">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
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
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>

                                        <td>{{$category->status}}</td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm" data-categoryid="{{ $category->id }}"
                                                    data-toggle="modal" data-target="#editModal">Edit</button>

                                            <button type="submit" class="btn btn-danger btn-sm" data-categoryid="{{ $category->id }}"
                                                    data-toggle="modal" data-target="#deleteModal">Delete</button>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal-->
                                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Request</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>

                                                <form action="{{ Route('category-edit') }}" method="post">

                                                    @csrf
                                                    {{method_field('put')}}
                                                    <div class="modal-body">
                                                        <input type="hidden" name="categories_id" id="category_id" value="">

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

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Edit</button>
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

                                                <form action="{{ Route('category-delete') }}" method="get">

                                                    <div class="modal-body">
                                                        <p>Select "Delete" below if you are ready to delete the current category.</p>
                                                        <input type="hidden" name="categories_id" id="category_id" value="">
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
                                {{$categories->links('paginationLinks')}}
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
            var category_id = button.data('categoryid')
            var modal = $(this)
            modal.find('.modal-body #category_id').val(category_id);
        })

    </script>

    <script>
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var category_id = button.data('categoryid')
            var modal = $(this)
            modal.find('.modal-body #category_id').val(category_id);
        })

    </script>
@endsection
