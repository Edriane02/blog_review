@extends('layouts.app')
@section('title', 'Maintenance')

@section('contents')

<main class="bg-grey pt-80 pb-50">
        <div class="container">
            <div class="row pt-80">
                <div class="col-lg-6 col-md-12 d-lg-block d-none pr-50"><img src="{{ asset('guestAssets/imgs/static/maintenance-ui-comp.png') }}" alt="" width="360"></div>
                <div class="col-lg-6 col-md-12 pl-50 text-md-center text-lg-left">
                    <h1 class="mb-30 font-weight-900 page-404">Coming soon!</h1>
                    <p style="font-size: 16px;">We’re polishing things up to provide you a better experience – more things coming soon!
                    </p>
                    <p>&nbsp;</p> <!-- extra space -->
                    <div>
                        <a class="button button-contactForm mt-30 text-white" href="{{ route('home') }}">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
        <br /><br /><br /><br /><br />
    </main>


@endsection