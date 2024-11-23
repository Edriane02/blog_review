@extends('layouts.app')
@section('title', 'Contact Us')

@section('contents')

<main class="bg-grey pb-30">
@include('partials.sweetalert')

        <div class="mb-50">
            <div class="container">
                <br /><br /><br />
                <h1 class="contact-us-title text-center mb-50">
                    Contact Us
                </h1>
                <center><img src="{{ asset('guestAssets/imgs/static/woman-reading-comp.png') }}" width="500" alt=""></center>
            </div>
        </div>
        <div class="container single-content">
            <div class="entry-wraper mt-50">
                <p class="font-large">We are <strong>Literary Critical Guild Reviews</strong>, passionate about exploring literature, offering in-depth reviews that capture the essence of each book, helping you discover new worlds and perspectives. Enhance your marketing with our expert reviews, tailored for both new and established authors, to get your book noticed and boost sales instantly.</p>
                <br />

                <h3 class="mt-30"><i class="bi bi-envelope"></i>&nbsp;&nbsp;Email us</h3>
                <hr class="wp-block-separator is-style-wide">
                <p class="font-medium-custom">You can contact us directly at: <a style="color: #4379F2;" href="mailto:sales@professionalreview.com">sales@professionalreview.com</a></p>

                <h3 class="mt-45"><i class="bi bi-send"></i>&nbsp;&nbsp;Or send us a message</h3>
                <hr class="wp-block-separator is-style-wide">

                <form class="form-contact comment_form" action="{{ route('contact.submit') }}" method="POST" id="contact-form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="full_name"><strong>Full Name <span class="text-danger">*</span></strong></label>
                                <input class="form-control" name="full_name" value="{{ old('full_name') }}" id="full_name" type="text" placeholder="" required>
                                @error('full_name')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email"><strong>Email <span class="text-danger">*</span></strong></label>
                                <input class="form-control" name="email" value="{{ old('email') }}" id="email" type="email" placeholder="" required>
                                @error('email')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="phone_number"><strong>Phone number <span class="text-danger">*</span></strong></label>
                                <input class="form-control" name="phone_number" value="{{ old('phone_number') }}" id="phone_number" type="number" placeholder="" required>
                                @error('phone_number')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="message"><strong>Message <span class="text-danger">*</span></strong></label>
                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="11" placeholder="" required>{{ old('message') }}</textarea>
                                <small id="messageHelp" class="form-text text-muted">Maximum of 1000 characters.</small>
                                @error('message')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="button button-contactForm">Send message</button>
                    </div>
                </form>
            </div>
        </div> <!-- /.container -->
    </main>

    <script>
        const messageField = document.getElementById('message');
        const messageHelp = document.getElementById('messageHelp');
        const maxChars = 1000;

        messageField.addEventListener('input', function() {
            if (messageField.value.length > maxChars) {
                messageField.value = messageField.value.slice(0, maxChars);
            }
            const remaining = maxChars - messageField.value.length;
            messageHelp.textContent = `Maximum of 1000 characters. You have ${remaining} characters left.`;
        });
    </script>

@endsection