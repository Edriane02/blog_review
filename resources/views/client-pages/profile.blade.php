@extends('layouts.app')
@section('title', 'Profile')

@section('contents')

<main class="bg-grey pt-80 pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap widget-taber-content p-30 bg-white border-radius-10">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1 text-center">
                                <h3 class="mb-30 font-weight-900">Profile</h3>
                            </div>
                            <div class="text-center">
                                <img src="{{ ('guestAssets/imgs/static/profile-ui.svg') }}" width="300">
                                <h4 class="font-weight-900">Hello, {{ $clientProfile->fname }} {{ $clientProfile->lname }}!</h4>
                                <p class="text-muted">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="text-muted text-center">Want to edit your profile? <a style="color: #5869da!important;" href="{{ route('clientEditProfile') }}">Click here</a>.</div>
                            <br />
                            <center><a class="btn btn-sm btn-danger" href="{{ route('logout') }}">Logout</a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

@endsection