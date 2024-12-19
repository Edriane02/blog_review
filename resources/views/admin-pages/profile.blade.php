@extends('layouts.sidebar')
@section('title', 'Profile')

@section('contents')

<div class="page-content">
@include('partials.sweetalert')

                <!-- Page title start -->
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
                 <!-- Page title end -->

                <div class="container-fluid">
                    <div class="page-content-wrapper">
                        <div class="row justify-content-center">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title font-size-16 mt-0">🌟 Hello, {{ $adminProfile->fname }}!</h4>
                                        <center>
                                            <img class="img-thumbnail rounded-circle" src="{{ asset('guestAssets/imgs/static/default_photo_resized.jpg') }}" width="180">
                                            <br /><br />
                                            <h3>
                                                {{ $adminProfile->fname }}
                                                @if($adminProfile->mname) {{ $adminProfile->mname }} @endif
                                                {{ $adminProfile->lname }}
                                                @if($adminProfile->suffix) {{ $adminProfile->suffix }} @endif
                                            </h3>
                                            <p style="margin-bottom: 0.5em;" class="text-muted">{{ Auth::user()->email }}</p>
                                            <!-- <span style="font-size: 12px;" class="badge badge-soft-primary">[Role]</span> -->
                                            <br /><br /><br />

                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target=".editProfileModal"><i class="bi bi-pencil"></i> Edit Profile</button>
                                            <br />
                                            <a style="color: #495057; font-weight: 700; font-size: 0.9em;" href="{{ route('changePasswordPage') }}"><i class="bi bi-gear-fill"></i> Change Account Password</a>
                                        </center>
                                            
                                        <!-- Edit profile modal -->
                                        <div class="modal fade editProfileModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="editProfileModalLabel">Edit Profile</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="{{ route('updateProfile') }}">
                                                                @csrf
                                                                <div class="mb-4">
                                                                    <p class="text-muted"><strong>User ID:</strong> {{ $adminProfile->user_id }}</p>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="first_name">First Name <span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text" name="first_name" value="{{ $adminProfile->fname }}" placeholder="" id="first_name" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="middle_name">Middle Name</label>
                                                                    <input class="form-control" type="text" name="middle_name" value="{{ $adminProfile->mname }}" placeholder="" id="middle_name">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text" name="last_name" value="{{ $adminProfile->lname }}" placeholder="" id="last_name">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="suffix">Suffix</label>
                                                                    <input class="form-control" type="text" name="suffix" value="{{ $adminProfile->suffix }}" placeholder="" id="suffix">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="email">Email <span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="email" name="email" value="{{ Auth::user()->email }}" placeholder="" id="email" required>
                                                                </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
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