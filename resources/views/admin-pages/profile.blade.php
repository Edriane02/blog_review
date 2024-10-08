@extends('layouts.sidebar')
@section('title', 'Profile')

@section('contents')

<div class="page-content">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="container-fluid">
                     <div class="row align-items-center">
                         <div class="col-sm-6">
                             <div class="page-title">
                                 <h1 class="page-title-custom">Profile</h1>
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
                                        <h4 class="card-title font-size-16 mt-0">🌟 Hello, James!</h4>
                                        <center>
                                            <img class="img-thumbnail rounded-circle" src="{{ asset('adminAssets/images/users/avatar-7.jpg') }}" width="180">
                                            <br /><br />
                                            <h3>James Raphael</h3>
                                            <p style="margin-bottom: 0.5em;" class="text-muted">james.raphael@bookmarcalliance.com</p>
                                            <span style="font-size: 12px;" class="badge badge-soft-primary">Administrator</span>
                                            <br /><br /><br />

                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target=".editProfileModal"><i class="bi bi-pencil"></i> Edit Profile</button>
                                            <br />
                                            <a style="color: #495057; font-weight: 700; font-size: 0.9em;" href="change-password.html"><i class="bi bi-gear-fill"></i> Change Account Password</a>
                                        </center>
                                            
                                        <!-- Edit Profile Modal -->
                                        <div class="modal fade editProfileModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="editProfileModalLabel">Edit Profile</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="#">
                                                                <div class="upload-container mb-3" id="uploadContainer">
                                                                    <input type="file" id="fileInput" accept="image/*" hidden required>
                                                                    <div class="upload-area" id="uploadArea">
                                                                        <h1 class="text-muted"><i class="bi bi-cloud-arrow-up"></i></h1>
                                                                        <p>Drag & Drop your image here or <span id="browseText">browse</span></p>
                                                                    </div>
                                                                        <img id="previewImage" class="hidden" alt="Image Preview">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="dname">Display Name</label>
                                                                    <input class="form-control" type="text" value="James Raphael" placeholder="Enter name" id="dname">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="dname">Email</label>
                                                                    <input class="form-control" type="email" value="james.raphael@bookmarcalliance.com" placeholder="Enter email" id="email">
                                                                </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                                                </div>
                                                            </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </div> <!-- /.card-body -->
                                </div> <!-- /.card -->
                            </div> <!-- /.col-xl-4 -->
                        </div> <!-- /.row justify-content-center -->
                    </div>
                </div> <!-- /.container-fluid -->
            </div>

@endsection