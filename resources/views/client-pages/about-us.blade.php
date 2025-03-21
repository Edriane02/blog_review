@extends('layouts.app')
@section('title', 'About Us')

@section('contents')

    <main class="bg-grey pb-30">
        <div class="container">
            <br /><br /><br />
            <h1 class="about-us-title text-center mb-50">
                <span class="fancy-underline">Connect with More Readers</span>
            </h1>

            <figure class="image mb-30 m-auto text-center border-radius-10">
                <img class="border-radius-10" src="{{ asset('guestAssets/imgs/static/banner-with-logo.png') }}" alt="" />
            </figure>

            <article class="entry-wraper">
                <h3 class="custom-about-us text-center">The Eastern Review</h3>
                <p class="text-center" style="font-size: 16px; font-style: italic;"><b>Uncovering world’s stories, one book at a time.</b></p>
                <hr class="wp-block-separator is-style-wide">
                <h4 class="mb-3"><b>About Us</b></h4>
                <p class="font-large">
                    Books are more than just stories—they are gateways to diverse worlds of thought, culture, and
                    experience. Our mission is to engage with literature thoughtfully and illuminatingly, revealing the
                    unique resonance of each work.<br /><br />
                    We offer a range of review options to suit different needs—from concise overviews that capture a book's
                    essence to in-depth analyses that explore its deeper themes. Our commitment is to fairness, insight, and
                    a genuine love for the written word.<br /><br />
                    Though our name evokes a broad literary landscape, our passion for great literature knows no boundaries.
                    We celebrate books from every corner of the globe, inviting readers and authors alike to join us in a
                    rich conversation that transcends geography and tradition.
                </p>
                <br />
                <center><a class="contact-us-today-btn" href="{{ route('contactUs') }}">Contact Us Today&nbsp;<i
                            class="bi bi-arrow-right"></i></a></center>
            </article>
        </div> <!-- /.container -->
        <br /><br /><br /><br /><br /><br />
    </main>

@endsection