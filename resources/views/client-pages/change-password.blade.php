@extends('layouts.app')
@section('title', 'Change Password')

@section('contents')

<main class="bg-grey pt-80 pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap widget-taber-content p-30 bg-white border-radius-10">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1 text-center">
                                <h3 class="mb-30 font-weight-900">Change Password</h3>
                            </div>
                            <form method="POST" action="{{ route('clientChangePwdAction') }}">
                                @csrf
                                <div class="form-group">
                                <label for="current_password"><strong>Enter Your Current Password</strong></label>
                                    <input class="form-control" type="password" name="current_password" placeholder="Current password" required>
                                </div>

                                <div class="form-group">
                                    <label for="new_password"><strong>Create a New Password</strong></label>
                                    <div class="input-group">
                                                        <input class="form-control" type="password" name="new_password" placeholder="New password" id="new_password" minlength="8" required>
                                                            <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()">
                                                            <i id="togglePasswordIcon" class="bi bi-eye-slash"></i>
                                                        </button>
                                                        </div>
                                    <small class="text-muted">Password should be a minimum of 8 characters.</small>
                                </div>

                                <div class="form-group">
                                    <label for="new_password_confirmation"><strong>Confirm New Password</strong></label>
                                    <input class="form-control" id="new_password_confirmation" type="password" name="new_password_confirmation" placeholder="Confirm new password" required>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn-block mb-4" id="registerButton">Change Password</button>
                                </div>
                            </form>
                            <div class="text-muted text-center"><a style="color: #5869da!important;" href="{{ route('clientEditProfile') }}">← Go back</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
</main>

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