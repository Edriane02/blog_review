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
                            <form method="post">
                                <div class="form-group">
                                <label><strong>Enter Your Old Password</strong></label>
                                    <input class="form-control" type="password" name="old_password" placeholder="Old password" required>
                                </div>

                                <div class="form-group">
                                    <label><strong>Create a New Password</strong></label>
                                    <input class="form-control" type="password" name="new_password" placeholder="New password" required>
                                </div>

                                <div class="form-group">
                                    <label><strong>Confirm New Password</strong></label>
                                    <input class="form-control" type="password" name="confirm_new_password" placeholder="Confirm new password" required>
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

@endsection