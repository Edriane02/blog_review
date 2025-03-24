@extends('layouts.app')
@section('title', 'Contact Us')

@section('contents')

<main class="bg-grey pb-30">
@include('partials.sweetalert')

        <div class="mb-50">
            <div class="container">
                <br /><br /><br />
                <h1 class="contact-us-title text-center">
                    Contact Us
                </h1>
                <center><img class="img-filter-brown" src="{{ asset('guestAssets/imgs/static/reading_book_comp.png') }}" width="320" alt=""></center>
            </div>
        </div>
        <div class="container single-content">
            <div class="entry-wraper mt-50">
                <p class="font-large">At <b>The Eastern Review</b>, we are passionate about literature, providing insightful reviews that truly capture each book's essence. Our in-depth analyses help readers explore new ideas and perspectives. Whether you're a new or seasoned author, our expert reviews can elevate your book's visibility and drive sales effectively.</p>
                <br />

                <h3 class="mt-30"><i class="bi bi-envelope"></i>&nbsp;&nbsp;Email us</h3>
                <hr class="wp-block-separator is-style-wide">
                <p class="font-medium-custom">You can contact us at: <a style="color: #4379F2;" href="mailto:contact@example.com">contact@example.com</a></p>

                <h3 class="mt-45"><i class="bi bi-send"></i>&nbsp;&nbsp;Or send us a message</h3>
                <hr class="wp-block-separator is-style-wide">

                <form class="form-contact comment_form" action="{{ route('contact.submit') }}" method="POST" id="contact-form" novalidate>
                    @csrf
                    <label for="website_url" style="display:none;">Your Website (optional)</label>
                    <input type="email" name="website_url" id="website_url" style="display:none;" autocomplete="off">
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var weirdcatcher = document.getElementById("website_url");
                            if (weirdcatcher) {
                                weirdcatcher.value = "";
                            }
                        });
                    </script>

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
                                <input class="form-control" name="email" value="{{ old('email') }}" id="email" type="email" placeholder="" autocomplete="on" required>
                                @error('email')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="phone_number"><strong>Phone number <span class="text-danger">*</span></strong></label>
                                <input class="form-control" name="phone_number" value="{{ old('phone_number') }}" id="phone_number" type="tel" placeholder="" required>
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