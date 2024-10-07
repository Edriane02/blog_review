<!-- GUEST REGISTER -->

@extends('layouts.app')
@section('title', 'Register')

@section('contents')
    <main class="bg-grey pt-80 pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap widget-taber-content p-30 bg-white border-radius-10">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1 text-center">
                                <h3 class="mb-30 font-weight-900">Create an account</h3>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="mname" placeholder="Middle Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="suffix" placeholder="Suffix">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm password" required>
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="agreeCheckbox">
                                            <label class="form-check-label" for="agreeCheckbox">
                                                <span>I agree to <a style="color: #5869da;" href="#">Terms & Policy</a>.</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn-block" id="registerButton">Sign up</button>
                                </div>
                            </form>
                            <div class="text-muted text-center">Already have an account? <a style="color: #5869da!important;" href="{{ route('login') }}">Login here</a>.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection