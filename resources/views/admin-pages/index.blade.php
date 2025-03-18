<!-- CMS DASHBOARD -->

@extends('layouts.sidebar')
@section('title', 'Dashboard')

@section('contents')

<div class="page-content">

    <!-- Page title start -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="">
                    <div class="page-title">
                        <h2 class="page-title-custom">The Eastern Review | Content Management System</h2>
                        <p class="page-title-custom">Dashboard</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page title end -->

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <br /><br /><br />
            <center>
                <img class="image-responsive mt-5" src="{{ asset('adminAssets/images/dashboard_reading.svg') }}" width="400" alt="People reading">
                <br /><br />
                <p style="font-family: 'Libre Baskerville', serif; font-size: 17px;">A book is a dream that you hold in your hand.</p>
            </center>
        </div>
    </div> <!-- /.container-fluid -->
</div>

@endsection