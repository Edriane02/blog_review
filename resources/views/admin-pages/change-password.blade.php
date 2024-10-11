@extends('layouts.sidebar')
@section('title', 'Change Account Password')

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
                                            <h4 class="card-title font-size-16 mt-0"></h4>
                                                <h3 class="text-center">Change Password</h3>
                                                <br /><br />

                                                <!-- Form Start -->
                                                <form method="post" action="#">
                                                    <div class="mb-3">
                                                        <label for="oldpassword">Old Password</label>
                                                        <input class="form-control" type="password" placeholder="Type a password" id="oldpassword">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="newpassword">New Password</label>
                                                        <input class="form-control" type="password" placeholder="Type a password" id="newpassword">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="confirmpassword">Confirm New Password</label>
                                                        <input class="form-control" type="password" placeholder="Type a password" id="confirmpassword">
                                                    </div>

                                                    <div>
                                                        <button type="button" class="btn btn-primary waves-effect waves-light mb-3">Save Changes</button>
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