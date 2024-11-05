@extends('layouts.sidebar')
@section('title', 'Change Account Password')

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
                                                <p class="text-muted text-center"><i class="bi bi-person-circle"></i>&nbsp;{{ auth()->user()->email }}</p>
                                                <br /><br />

                                                <!-- Form Start -->
                                                <form method="POST" action="{{ route('changePassword') }}">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="current_password">Current Password</label>
                                                        <input class="form-control" type="password" name="current_password" placeholder="Type a password" id="current_password" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="new_password">New Password</label>
                                                        <div class="input-group">
                                                        <input class="form-control" type="password" name="new_password" placeholder="Type a password" id="new_password" required>
                                                            <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()">
                                                            <i id="togglePasswordIcon" class="bi bi-eye-slash"></i>
                                                        </button>
                                                        </div>
                                                        <small class="text-muted">Password should be a minimum of 8 characters.</small>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="new_password_confirmation">Confirm New Password</label>
                                                        <input class="form-control" type="password" name="new_password_confirmation" placeholder="Type a password" id="new_password_confirmation" required>
                                                    </div>

                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                                        <a href="{{ route('profilePage') }}" class="btn btn-secondary">Back</a>
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

            <script>
                // Toggle new password visibility
                function togglePasswordVisibility() {
                    const passwordInput = document.getElementById("new_password");
                    const toggleIcon = document.getElementById("togglePasswordIcon");

                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        toggleIcon.classList.remove("bi-eye-slash");
                        toggleIcon.classList.add("bi-eye");
                    } else {
                        passwordInput.type = "password";
                        toggleIcon.classList.remove("bi-eye");
                        toggleIcon.classList.add("bi-eye-slash");
                    }
                }
            </script>

@endsection