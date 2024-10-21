@extends('layouts.sidebar')
@section('title', 'Users (Client)')

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
                        <div class="">
                            <div class="page-title">
                                <h1 class="page-title-custom">Users (Client)</h1>
                                <p>This page shows a list of all users who have created an account on this website. This is <b>NOT</b> a list of users with access to manage the CMS.<br />To manage users with access to the CMS, please go to <b>Designation</b> instead.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-end d-sm-block">
                                
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
                                                    <th>#</th>
                                                    <th>Name & Email</th>
                                                    <th>Date Joined</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <tr>
                                                    <td>
                                                        1
                                                    </td>
                                                    <td>
                                                        <strong>Simon Jenkins</strong><br />
                                                        <span class="admin-user-email text-muted">simonjenkins@example.com</span>
                                                    <td>Sep 12, 2024</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            
                                                            <button class="btn btn-sm btn-danger" onclick="if(confirm('Are you sure you want to delete this user (client)?')) { /* Add delete action here */ }"><i class="bi bi-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        2
                                                    </td>
                                                    <td>
                                                        <strong>Jette Greenfield</strong><br />
                                                        <span class="admin-user-email text-muted">jettegreenfield@example.com</span>
                                                    <td>Sep 12, 2024</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <button class="btn btn-sm btn-danger" onclick="if(confirm('Are you sure you want to delete this user (client)?')) { /* Add delete action here */ }"><i class="bi bi-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                    </div>
                </div> <!-- container-fluid -->
            </div>

<!-- Delete SweetAlert Dialog start -->
<script>
    function confirmDelete(tagId) {
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
                document.getElementById('delete-form-' + tagId).submit();
            }
        });
    }
</script>
<!-- Delete SweetAlert Dialog end -->

@endsection