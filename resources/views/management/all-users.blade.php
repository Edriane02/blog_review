@extends('layouts.sidebar')
@section('title', 'All Users')

@section('contents')

<div class="page-content">
                <!-- start page title -->
                <div class="page-title-box">
                    <div class="container-fluid">
                     <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title">
                                <h1 class="page-title-custom">All Users</h1>
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
                                                    <th>Name & Email</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <!-- Sample data -->
                                                <tr>
                                                    <td>
                                                        <strong>James Raphael</strong><br />
                                                        <span class="admin-user-email text-muted">jamesraphael@example.com</span>
                                                    <td><strong>Administrator</strong></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <!-- Condition here: Shouldn't delete the primary admin -->
                                                            <button class="btn btn-sm btn-danger" onclick="if(confirm('Are you sure you want to delete this user?')) { /* Add delete action here */ }" disabled><i class="bi bi-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Faustine Sinclair</strong><br />
                                                        <span class="admin-user-email text-muted">faustinesinclair@example.com</span>
                                                    <td><strong>Poster</strong></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <button class="btn btn-sm btn-danger" onclick="if(confirm('Are you sure you want to delete this user?')) { /* Add delete action here */ }"><i class="bi bi-trash"></i></button>
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

@endsection