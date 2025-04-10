@extends('layouts.sidebar')
@section('title', 'Designation Roles')

@section('contents')

<div class="page-content">
@include('partials.sweetalert')

                <!-- Page title start -->
                <div class="page-title-box">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="page-title">
                                    <h1 class="page-title-custom">Designation Roles</h1>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-end d-sm-block">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".addDesignationModal">Add New Role</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page title end -->

                <div class="container-fluid">
                    <div class="page-content-wrapper">
                        <div class="row justify-content-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($designations as $designation)
                                                        <tr>
                                                            <td>
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td>
                                                                <strong>{{ $designation->designation }}</strong><br />
                                                            </td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <!-- Edit button -->
                                                                    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal"
                                                                        data-bs-target="#editDesignationModal-{{ $designation->id }}">
                                                                        <i class="bi bi-pencil-square"></i>
                                                                    </button>&nbsp;

                                                                    <!-- Delete button -->
                                                                    <form id="delete-form-{{ $designation->id }}"
                                                                        action="{{ route('deleteDesignation', $designation->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $designation->id }})">
                                                                            <i class="bi bi-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- /.col-12 -->
                            </div> <!-- /.row -->
                        </div>

                         <!-- Add New Designation Modal -->
                            <div class="modal fade addDesignationModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addDesignationModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="addDesignationModalLabel">Add New Designation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <form method="POST" action="{{ route('addDesignation') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="revname">Designation <span class="text-danger">*</span></label>
                                                    <input class="form-control" name="designation" type="text" placeholder="Enter role..." id="revname" required>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Add role</button>
                                            </div>
                                        </form>
                                        <!-- Form end -->

                                    </div> <!-- /.modal-content -->
                                </div> <!-- /.modal-dialog -->
                            </div> <!-- /.modal -->
                            <!-- End of Add New Designation Modal -->

                            @foreach ($designations as $designation)
                                <!-- Edit Designation Modal -->
                                <div class="modal fade" data-bs-backdrop="static" id="editDesignationModal-{{ $designation->id }}" tabindex="-1" aria-labelledby="editDesignationLabel-{{ $designation->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0" id="editDesignationModalLabel-{{ $designation->id }}">Edit Designation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <!-- Form start -->
                                            <form method="POST" action="{{ route('editDesignation') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <!-- Required field indicator -->
                                                    <p style="font-size: 12px;" class="mb-2"><span class="text-danger">*</span> Indicates required field.</p>

                                                    <!-- Hidden ID -->
                                                    <input type="hidden" name="id" value="{{ $designation->id }}">

                                                    <div class="mb-3">
                                                        <label for="revname-{{ $designation->id }}">Designation <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="designation" type="text" value="{{ $designation->designation }}" id="revname-{{ $designation->id }}" placeholder="Enter role..." required>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                                </div>
                                            </form>
                                            <!-- Form end -->

                                        </div> <!-- /.modal-content -->
                                    </div> <!-- /.modal-dialog -->
                                </div> <!-- /.modal -->
                                <!-- End of Edit Designation Modal -->
                            @endforeach
                    </div>
                </div> <!-- /.container-fluid -->
            </div>

<script>
    document.getElementById('browseText').addEventListener('click', function () {
        document.getElementById('fileInput').click();
    });
</script>

@include('partials.swal-confirm-delete')

@endsection