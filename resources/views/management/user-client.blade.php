@extends('layouts.sidebar')
@section('title', 'Client Users')

@section('contents')

<div class="page-content">
@include('partials.sweetalert')

                <!-- Page title start -->
                <div class="page-title-box">
                    <div class="container-fluid">
                     <div class="row align-items-center">
                        <div>
                            <div class="page-title">
                                <h1 class="page-title-custom">Registered Users</h1>
                                <p>This page shows a list of all users who have signed up for an account on this website.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
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
                                                    <th>Date Joined</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                            @if($client->count() > 0)
                                                @foreach($client as $clients)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        {{ $clients->user_id }}
                                                    </td>
                                                    <td>
                                                        <strong>{{ $clients->fullName() }}</strong><br />
                                                        <span class="admin-user-email text-muted">{{ $clients->clientUser->email }}</span>
                                                    <td>{!! $clients->created_at->format('M d, Y') . '<br>' . $clients->created_at->format('h:i A') !!}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            
                                                            <form id="delete-form-{{ $clients->id }}"
                                                                action="{{ route('deleteClientUser', $clients->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-sm btn-danger"
                                                                    onclick="confirmDelete({{ $clients->id }})">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </form>
                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="4" class="text-center">
                                                                <div class="alert alert-info" role="alert">
                                                                    No clients found.
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div> <!-- /.col-12 -->
                            </div> <!-- /.row -->
                        </div>

                        <!-- Add New Client Modal -->
                        <div class="modal fade newClientModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
                            aria-labelledby="newClientModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0" id="newClientModalLabel">Add New Client</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form method="POST" action="{{ route('new-client-user') }}" enctype="multipart/form-data">
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
                                                        <input class="form-control" type="text" name="suffix" placeholder="Enter Suffix" id="email">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="email">Email</label>
                                                        <input class="form-control" type="email" name="email" placeholder="Enter email" id="email">
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
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Add Client</button>
                                        </div>
                                    </form>
                                    <!-- Form end -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- End of Add New Client Modal -->
                    </div>
                </div> <!-- /.container-fluid -->
            </div>

<script>
    
    // SweetAlert custom delete dialog
    function confirmDelete(messageId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This will delete the user and all their stored information, revoke their access, and you won't be able to undo this action.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form
                document.getElementById('delete-form-' + messageId).submit();
            }
        });
    }
</script>

@endsection