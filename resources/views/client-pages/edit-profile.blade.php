@extends('layouts.app')
@section('title', 'Edit Profile')

@section('contents')

<main class="bg-grey pt-80 pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap widget-taber-content p-30 bg-white border-radius-10">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1 text-center">
                                <h3 class="mb-30 font-weight-900">Edit Profile</h3>
                            </div>
                            <form method="post">
                                <div class="form-group">
                                    <label><strong>Name</strong></label>
                                    <input type="text" required="" class="form-control" value="Simon Jenkins" name="display_name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label><strong>Email</strong></label>
                                    <input type="email" required="" value="simonjenkins@example.com" class="form-control" name="email" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn-block mb-4" id="registerButton">Save Changes</button>
                                </div>
                            </form>
                            <div class="text-muted text-center mb-3">Want to change your password? <a style="color: #5869da!important;" href="change-password.html">Click here</a>.</div>
                            <div class="text-muted text-center"><a style="color: #5869da!important;" href="profile.html">← Go back</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br /><br /><br /><br />
    </main>
    

@endsection