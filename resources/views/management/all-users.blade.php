@extends('layouts.sidebar')
@section('title', 'All Users')

@section('contents')

<div class="page-content">
    @include('partials.sweetalert')
                <!-- Page title start -->
                <div class="page-title-box">
                    <div class="container-fluid">
                     <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title">
                                <h1 class="page-title-custom">All Users</h1>
                                <p>This page shows the combined list of admins and clients.</p>
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
                                                        <th>ID</th>
                                                        <th>Name & Email</th>
                                                        <th>Role</th>
                                                        <th>Type</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($users->count() > 0)
                                                        @foreach($users as $user)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $user['user_id'] }}</td>
                                                                <td>
                                                                    <strong>{{ $user['name'] }}</strong><br />
                                                                    <span class="text-muted">{{ $user['email'] }}</span>
                                                                </td>
                                                                <td><strong>{{ $user['role'] }}</strong></td>
                                                                <td><strong>{{ $user['type'] }}</strong></td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                    @if($user['id'])
                                                                        <form id="delete-form-{{ $user['id'] }}" action="{{ route('deleteUser', $user['id']) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $user['id'] }})"
                                                                            @if($user['role'] === 'management') disabled @endif>
                                                                                <i class="bi bi-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    @else
                                                                        <p class="text-danger">User ID not available for this user.</p>
                                                                    @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="5" class="text-center">
                                                                <div class="alert alert-info" role="alert">
                                                                    No users found.
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.container-fluid -->
            </div>

    @include('partials.swal-confirm-delete')
@endsection