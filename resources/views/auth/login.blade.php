@extends('layouts.app')
@section('title', 'Login')

@section('contents')

<main class="bg-grey pt-80 pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap widget-taber-content p-30 bg-white border-radius-10">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1 text-center">
                                <h3 class="mb-30 font-weight-900">Login</h3>
                            </div>
                            <form method="POST" action="{{ route('loginAction') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="email" placeholder="Your Email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required="" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                            <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                        </div>
                                    </div>
                                    <a class="text-muted" href="#">Forgot password?</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn-block">Login</button>
                                </div>
                            </form>
                            <div class="text-muted text-center">Don't have an account? <a style="color: #5869da!important;" href="register.html">Sign up here</a>.</div>
                        </div>
                    </div>
                </div>
            </div>
            <br /><br /><br /><br /><br /><br /><br />
        </div>
    </main>

@endsection