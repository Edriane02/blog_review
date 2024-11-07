@extends('layouts.sidebar')
@section('title', 'Admin Users')

@section('contents')

<div class="page-content">
@include('partials.sweetalert')

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="container-fluid">
                     <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title">
                                <h1 class="page-title-custom">Admin Users</h1>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-end d-sm-block">
                                <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal"
                                    data-bs-target=".newAdminModal">Add New Admin</button>
                            </div>
                        </div>
                     </div>
                    </div>
                 </div>
                 <!-- end page title -->

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
                                                    <th>ID</th>
                                                    <th>Name & Email</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                             @if($admin->count() > 0)
                                                @foreach($admin as $admins)
                                                <tr>
                                                    <td>
                                                        {{ $admins->user_id }}
                                                    </td>
                                                    <td>
                                                        <strong>{{ $admins->fullName()}}</strong><br />
                                                        <span class="admin-user-email text-muted">{{ $admins->adminUser->email }}</span>
                                                    <td><strong>{{ $admins->designationType->designation }}</strong></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <form id="delete-form-{{ $admins->id }}"
                                                                action="{{ route('deleteAdminUser', $admins->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-sm btn-danger"
                                                                    onclick="confirmDelete({{ $admins->id }})">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="3" class="text-center">
                                                                <div class="alert alert-info" role="alert">
                                                                    No Admins found.
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>


                        <!-- Add New Admin Modal -->
                        <div class="modal fade newAdminModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
                            aria-labelledby="newAdminModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0" id="newAdminModalLabel">Add New Client</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form method="POST" action="{{ route('new-admin-user') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">

                                

                                                    <div class="mb-3">
                                                        <label for="fname">First Name</label>
                                                        <input class="form-control" type="text" name="fname" placeholder="Enter First Name" id="fname">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="mname">Middle Name</label>
                                                        <input class="form-control" type="text" name="mname" placeholder="Enter Middle Name" id="mname">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="lname">Last Name</label>
                                                        <input class="form-control" type="text" name="lname" placeholder="Enter Last Name" id="lname">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="suffix">Suffix</label>
                                                        <input class="form-control" type="text" name="suffix" placeholder="Enter Suffix" id="suffix">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="email">Email</label>
                                                        <input class="form-control" type="email" name="email" placeholder="Enter email" id="email">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Role</label>
                                                            <select class="form-select" name="des_type">
                                                                <option value="">Select...</option>
                                                                @foreach($designation as $designations)
                                                                    <option value="{{ $designations->id }}">{{ $designations->designation }}</option>
                                                                @endforeach
                                                            </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="password">Password</label>
                                                        <input class="form-control" type="password" name="password" placeholder="Type a password" id="password">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="password">Password</label>
                                                        <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm password" id="password">
                                                    </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Add Admin</button>
                                        </div>
                                    </form>
                                    <!-- Form End -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- End of Add New Admin Modal -->


                    </div>
                </div> <!-- container-fluid -->
            </div>

@include('partials.swal-confirm-delete')

@endsection