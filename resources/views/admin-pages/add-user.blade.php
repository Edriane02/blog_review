@extends('layouts.sidebar')
@section('title', 'Add User')

@section('contents')

<div class="page-content">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="container-fluid">
                     <div class="row align-items-center">
                         <div class="col-sm-6">
                             <div class="page-title">
                                 <h1 class="page-title-custom">Designation</h1>   
                             </div>
                         </div>
                     </div>
                    </div>
                 </div>
                 <!-- end page title -->

                <div class="container-fluid">
                    <div class="page-content-wrapper">
                        <div class="row justify-content-center">
                            <div class="col-xl-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title font-size-16 mt-0"></h4>
                                                <h3 class="text-center">Add New User</h3>
                                                <br /><br />

                                                <!-- Form Start -->
                                                <form method="post" action="#">

                                                    <div class="mb-3">
                                                        <label>Role</label>
                                                            <select class="form-select">
                                                                <option value="">Select...</option>
                                                                <option value="Administrator">Administrator</option>
                                                                <option value="Poster">Poster</option>
                                                            </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="email">Email</label>
                                                        <input class="form-control" type="email" placeholder="Enter email" id="email">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="dp-name">Name</label>
                                                        <input class="form-control" type="text" placeholder="Enter name" id="dp-name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="password">Password</label>
                                                        <input class="form-control" type="password" placeholder="Type a password" id="password">
                                                    </div>

                                                    <div>
                                                        <button type="button" class="btn btn-primary waves-effect waves-light mb-3">Add User</button>
                                                    </div>
                                                </form>
                                                <!-- Form End -->
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div> <!-- container-fluid -->
            </div>

@endsection