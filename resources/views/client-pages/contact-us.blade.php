@extends('layouts.app')
@section('title', 'Contact Us')

@section('contents')

<main class="bg-grey pb-30">
        <div class="mb-50">
            <div class="container">
                <h1>&nbsp;</h1> <!-- some space -->
                <h1 class="contact-us-title text-center mb-50">
                    Contact Us
                </h1>
                <center><img src="{{ asset('guestAssets/imgs/static/woman-reading-comp.png') }}" width="500" alt=""></center>
            </div>
        </div>
        <div class="container single-content">
            <div class="entry-wraper mt-50">
                <p class="font-large">We are <strong>Stories Inc.</strong>, passionate about exploring literature, offering in-depth reviews that capture the essence of each book, helping you discover new worlds and perspectives. Enhance your marketing with our expert reviews, tailored for both new and established authors, to get your book noticed and boost sales instantly.</p>
                <br />

                <h3 class="mt-30"><i class="bi bi-envelope"></i>&nbsp;&nbsp;Email us</h3>
                <hr class="wp-block-separator is-style-wide">
                <p class="font-medium-custom">You can contact us directly at <a style="color: #4379F2;" href="mailto:sales@professionalreview.com">sales@professionalreview.com</a></p>

                <!-- Contact Form -->
                <h3 class="mt-45"><i class="bi bi-send"></i>&nbsp;&nbsp;Or send us a message</h3>
                <hr class="wp-block-separator is-style-wide">
                <form class="form-contact comment_form" action="#" id="commentForm">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="website" id="website" type="text" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Message"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="button button-contactForm">Send message</button>
                    </div>
                </form>
            </div>
        </div>
        <!--container-->
    </main>

@endsection