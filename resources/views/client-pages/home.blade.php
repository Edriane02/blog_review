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
                <a href="{{ route('contactUs') }}" class="btn btn-outline-primary btn-lg">Request a Review</a>
            </div>
        </div>
    </div>
    <br />
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
                                </div>
                                <div class="post-content p-30">
                                    <div class="entry-meta meta-0 font-small mb-10">
                                        @foreach($book->bookTag as $tag)
                                            @if($tag->book_tag !== 'Featured Review')
                                                <span class="post-cat text-info">{{ $tag->book_tag }}</span>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="d-flex post-card-content">
                                        <h5 class="post-title mb-20 font-weight-900">
                                            <a href="{{ route('viewPost', $book->id) }}">{{ $book->title }}</a>
                                            <br />
                                            <span style="font-size: 13px;">Authored by {{ $book->book_author }}</span>
                                        </h5>
                                        <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                            <span class="post-on">{{ $book->created_at->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
            <center>
                <img class="mb-3" src="{{ asset('guestAssets/imgs/static/featured.svg') }}" width="300">
                <h5 class="text-muted">No featured reviews — yet.</h5>
            </center>
            @endif
        </div>
    </div>

    <div class="featured-1">
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
                                    </div>
                                </div>
                                <div class="col-md-8 align-self-center">
                                    <div class="post-content">
                                        <div class="entry-meta meta-0 font-small mb-10">
                                            @foreach($book->bookTag as $tag)
                                                <span class="post-cat text-info">{{ $tag->book_tag }}</span>
                                            @endforeach
                                        </div>
                                        <h5 class="post-title font-weight-900 mb-20">
                                            <a href="{{ route('viewPost', $book->id) }}">{{ $book->title }}</a>
                                            <br />
                                            <span style="font-size: 13px;">Authored by {{ $book->book_author }}</span>
                                        </h5>
                                        <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                            <span class="post-on">{{ $book->created_at->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                @else
                <center>
                    <img class="mb-3" src="{{ asset('guestAssets/imgs/static/latest.svg') }}" width="300">
                    <h5 class="text-muted">No latest reviews — yet.</h5>
                </center>
                    <br /><br /><br />
                @endif

            </div>
        </div>

        <div>
            @if($latestBooks->count() > 0)
                <center><a class="see-more-btn" href="{{ route('latestReviewsPage') }}">See more&nbsp;<i class="bi bi-arrow-right"></i></a></center>
            @else
                &nbsp;
            @endif
        </div>
        </div>
    </div>

        <br /><br />
        <div class="container">
            <div class="sidebar-widget widget_tagcloud wow fadeInUp animated mb-30" data-wow-delay="0.2s">
                <div class="widget-header-2 position-relative mb-30">
                    <h5 class="mt-5 mb-30">Discover Books</h5>
                </div>
                <div class="tagcloud mt-50">
                    @if($tags->count() > 0)
                        @foreach($tags as $tag)
                            <a class="tag-cloud-link" href="{{ route('categorySearch', ['tagId' => $tag->id]) }}">{{ $tag->tag }}</a>
                        @endforeach
                    @else
                        <div class="alert alert-info" role="alert">
                            No tags found.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    
</main>

@endsection