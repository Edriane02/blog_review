@extends('layouts.sidebar')
@section('title', 'Users (Client)')

@section('contents')

<div class="page-content">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="container-fluid">
                     <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title">
                                <h1 class="page-title-custom">Users (Client)</h1>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-end d-sm-block">
                                <a class="btn btn-success waves-effect waves-light" href="add-user.html">Add New User</a>
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

@endsection