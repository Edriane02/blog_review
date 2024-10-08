@extends('layouts.app')
@section('title', 'Home')

@section('contents')

<main>
    <div class="featured-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <p class="heading-text-home">Dedicated to the</p>
                    <br />
                    <p class="heading-text-home-sub"><span class="fancy-underline">Art of Reading</span></p>
                    <p class="description-home text-muted">We are passionate about exploring literature, offering
                        in-depth reviews that capture the essence of each book, helping you discover new worlds and
                        perspectives. Enhance your marketing with our expert reviews, tailored for both new and
                        established authors, to get your book noticed and boost sales instantly.</p>

                </div>
                <div class="col-lg-6 text-right d-none d-lg-block">
                    <img src="{{ asset('guestAssets/imgs/static/reading.png') }}" alt="People reading">
                </div>
            </div>
            <p class="cta text-center">Interested in a Professional Review of Your Book?</p>
            <p class="cta-desc text-muted text-center">We enhance credibility, increase exposure, and boost sales,
                helping your book stand out and reach a wider audience.</p>
            <div class="button-container">
                <a href="#" class="btn btn-outline-primary">Request a Review</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="hot-tags pt-30 pb-30 font-small align-self-center">
            <div class="widget-header-3">
                <p class="widget-title-custom">Featured Reviews</p>
            </div>
        </div>
        <div class="loop-grid mb-30">
            @if($featuredBooks->count() > 0)
                <div class="row">

                    @foreach($featuredBooks as $book)
                        <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.2s">
                            <div class="post-card-1 border-radius-10 hover-up">
                                <div class="post-thumb thumb-overlay img-hover-slide position-relative"
                                    style="background-image: url({{ asset('storage/' . $book->banner) }})">
                                    <a class="img-link" href="{{ route('viewPost', $book->id) }}"></a>

                                    <!-- <ul class="social-share">
                                        <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                        <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i
                                                    class="elegant-icon social_facebook"></i></a></li>
                                        <li><a class="tw" href="#" target="_blank" title="Tweet now"><i
                                                    class="elegant-icon social_twitter"></i></a></li>
                                        <li><a class="pt" href="#" target="_blank" title="Pin it"><i
                                                    class="elegant-icon social_pinterest"></i></a></li>
                                    </ul> -->
                                </div>
                                <div class="post-content p-30">
                                    <div class="entry-meta meta-0 font-small mb-10">
                                        @foreach($book->bookTag as $tag)
                                            @if($tag->book_tag !== 'Featured Review')
                                                <a href="category-results.html">
                                                    <span class="post-cat text-info">{{ $tag->book_tag }}</span>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="d-flex post-card-content">
                                        <h5 class="post-title mb-20 font-weight-900">
                                            <a href="{{ route('viewPost', $book->id) }}">{{ $book->title }}</a>
                                            <br />
                                            <span style="font-size: 13px;">Authored by {{ $book->title }}</span>
                                        </h5>
                                        <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                            <span class="post-on">{{ $book->created_at->format('j F Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <h5 class="text-center text-muted">No featured reviews found.</h5>
            @endif
        </div>
    </div>

    <div class="container">
        <div class="post-module-3">
            <div class="widget-header-1 position-relative mb-30">
                <p class="widget-title-latest">Latest Reviews</p>
            </div>
            <div class="loop-list loop-list-style-1">
                @if($latestBooks->count() > 0)
                    @foreach($latestBooks as $book)
                        <article class="hover-up-2 transition-normal wow fadeInUp animated">
                            <div class="row mb-40 list-style-2">
                                <div class="col-md-4">
                                    <div class="post-thumb position-relative border-radius-5">
                                        <div class="img-hover-slide border-radius-5 position-relative"
                                            style="background-image: url({{ asset('storage/' . $book->banner) }})">
                                            <a class="img-link" href="{{ route('viewPost', $book->id) }}"></a>
                                        </div>
                                        <!-- <ul class="social-share">
                                            <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                            <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i
                                                        class="elegant-icon social_facebook"></i></a></li>
                                            <li><a class="tw" href="#" target="_blank" title="Tweet now"><i
                                                        class="elegant-icon social_twitter"></i></a></li>
                                            <li><a class="pt" href="#" target="_blank" title="Pin it"><i
                                                        class="elegant-icon social_pinterest"></i></a></li>
                                        </ul> -->
                                    </div>
                                </div>
                                <div class="col-md-8 align-self-center">
                                    <div class="post-content">
                                        <div class="entry-meta meta-0 font-small mb-10">
                                            @foreach($book->bookTag as $tag)
                                                <a href="category-results.html">
                                                    <span class="post-cat text-info">{{ $tag->book_tag }}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                        <h5 class="post-title font-weight-900 mb-20">
                                            <a href="{{ route('viewPost', $book->id) }}">{{ $book->title }}</a>
                                            <br />
                                            <span style="font-size: 13px;">Authored by {{ $book->title }}</span>
                                        </h5>
                                        <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                            <span class="post-on">{{ $book->created_at->format('j F Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                @else
                    <h5 class="text-center text-muted">No latest reviews found.</h5>
                    <br /><br /><br />
                @endif

            </div>
        </div>

        <div>
            <center><a class="see-more-btn" href="latest-reviews.html">See more&nbsp;<i class="bi bi-arrow-right"></i></a></center>
        </div>

        <br />
        <br />
        <div class="">
            <div class="sidebar-widget widget_tagcloud wow fadeInUp animated mb-30" data-wow-delay="0.2s">
                <div class="widget-header-2 position-relative mb-30">
                    <h5 class="mt-5 mb-30">Browse by Tags</h5>
                </div>
                <div class="tagcloud mt-50">
                    <a class="tag-cloud-link" href="category-results.html">Fiction</a>
                    <a class="tag-cloud-link" href="category-results.html">Non-Fiction</a>
                    <a class="tag-cloud-link" href="category-results.html">Mystery</a>
                    <a class="tag-cloud-link" href="category-results.html">Comedy</a>
                    <a class="tag-cloud-link" href="category-results.html">Novel</a>
                    <a class="tag-cloud-link" href="category-results.html">Biography</a>
                    <a class="tag-cloud-link" href="category-results.html">True Crime</a>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection