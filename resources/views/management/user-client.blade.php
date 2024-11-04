@extends('layouts.sidebar')
@section('title', 'Client Users')

@section('contents')

<div class="page-content">
    <!-- SweetAlert Dialogs start -->
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops... Something went wrong!',
                html: '{!! implode("", $errors->all("<li>:message</li>")) !!}', // This compiles the error messages into list items
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
    <!-- SweetAlert Dialogs end -->

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="container-fluid">
                     <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title">
                                <h1 class="page-title-custom">Client Users</h1>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-end d-sm-block">
                                <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal"
                                    data-bs-target=".newClientModal">Add New Client</button>
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
                                                    <th>Date Joined</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                            @if($client->count() > 0)
                                                @foreach($client as $clients)
                                                <tr>
                                                    <td>
                                                        {{ $clients->user_id }}
                                                    </td>
                                                    <td>
                                                        <strong>{{ $clients->fullName() }}</strong><br />
                                                        <span class="admin-user-email text-muted">{{ $clients->clientUser->email }}</span>
                                                    <td>{{ $clients->created_at->format('j F Y') }}</td>
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
                                                            <td colspan="3" class="text-center">
                                                                <div class="alert alert-info" role="alert">
                                                                    No Clients found.
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
                                    <!-- Form End -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- End of Add New Client Modal -->


                    </div>
                </div> <!-- container-fluid -->
            </div>

            <!-- Delete SweetAlert Dialog start -->
<script>
    function confirmDelete(clientId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form
                document.getElementById('delete-form-' + clientId).submit();
            }
        });
    }
</script>
<!-- Delete SweetAlert Dialog end -->

@endsection