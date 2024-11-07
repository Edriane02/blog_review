@extends('layouts.app')
@section('title', 'About Us')

@section('contents')

<main class="bg-grey pb-30">
        <div class="container">
                <h1>&nbsp;</h1> <!-- some space -->
                <h1 class="about-us-title text-center mb-50">
                    <span class="fancy-underline">Maximize Your Book's Reach</span>
                </h1>
            <!--end single header-->
            <figure class="image mb-30 m-auto text-center border-radius-10">
                <img class="border-radius-10" src="{{ asset('guestAssets/imgs/static/contact-us-bg-comp.jpg') }}" alt="" />
            </figure>
            <!--end figure-->

            <article class="entry-wraper">
                <h3 class="custom-about-us">About Us</h3>
                <hr class="wp-block-separator is-style-wide">
                <p class="font-large">
                    At <strong>Stories Inc.</strong>, we are passionate about exploring literature and offering in-depth reviews that capture the essence of each book. Our goal is to help you discover new worlds and perspectives through thoughtful and engaging critiques.
                    <br />
                    <br />
                    Enhance your marketing strategy with our expert reviews, tailored specifically for both new and established authors. Our insights are designed to get your book noticed and boost sales, providing the visibility and impact you need to succeed.
                    <br />
                    <br />
                    We believe in the power of stories to transform and connect us. Our dedicated team goes beyond surface-level analysis to offer nuanced evaluations that highlight the unique qualities of each book. Whether you’re an emerging author or a seasoned writer, our reviews are crafted to resonate with your target audience and amplify your book’s reach.
                    </p>
                <br />
                <center><a class="contact-us-today-btn" href="{{ route('contactUs') }}">Contact Us Today&nbsp;<i class="bi bi-arrow-right"></i></a></center>
            </article>
        </div> <!-- /.container -->
        <br /><br /><br /><br /><br /><br />
    </main>

@endsection