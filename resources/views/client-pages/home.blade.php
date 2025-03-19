@extends('layouts.app')
@section('title', 'Home')

@section('contents')

<main>

    <!-- Featured Author section -->
    @if(isset($featuredAuthor) && $featuredAuthor)
    <div class="author-featured-section py-5">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
                    <div class="author-image-container">
                        <img src="{{ asset('storage/' . $featuredAuthor->img_banner) }}" alt="Author with book" class="img-fluid rounded shadow-sm">
                    </div>
                </div>

                
                <div class="col-lg-7 col-md-6 align-self-center">
                    <p class="mb-2"><span class="badge badge-primary"><i class="bi bi-star-fill"></i>&nbsp;<b>FEATURED AUTHOR</b></span></p>
                    <h2 class="section-title mb-3">{{ $featuredAuthor->author_name }}</h2>
                    <!-- Headline -->
                    <h5 class="author-subtitle mb-3">{{ $featuredAuthor->headline }}</h5>
                    <div class="author-description text-muted mb-4">{!! Str::limit($featuredAuthor->body_text, 250) !!}</div>
                    <a href="{{ route('featured.author', $featuredAuthor->id) }}" class="btn btn-sm btn-primary">Read More&nbsp;&nbsp;<i class="bi bi-arrow-right"></i></a>
                </div>
                
            </div>
        </div>
    </div>
    @endif
    <!-- End of Featured Author section -->

    <div class="featured-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <p class="heading-text-home">The Home for</p>
                    <br />
                    <p class="heading-text-home-sub"><span class="fancy-underline">Passionate Readers</span></p>
                    <p class="description-home text-muted">Books are more than just stories—they’re conversations that transcend cultures and time. Our reviews offer different approaches, from concise overviews to deeper critiques, helping readers and writers connect with literature meaningfully.<br/><br/>
                    Though our name hints at an Eastern influence, our passion for books knows no borders. We celebrate stories from around the world, inviting everyone to engage in the dialogue of great writing.</p>
                    <a href="{{ route('contactUs') }}" class="btn btn-primary">Request a Review&nbsp;&nbsp;<i class="bi bi-box-arrow-up-right"></i></a>
                </div>
                <div class="col-lg-6 text-right d-none d-lg-block">
                    <img src="{{ asset('guestAssets/imgs/static/reading.png') }}" alt="People reading">
                </div>
            </div>
            <!-- <p class="cta text-center">Interested in a Professional Review of Your Book?</p>
            <p class="cta-desc text-muted text-center">We work to build your book's reputation, make it more visible, and generate increased sales, ensuring it captures attention and reaches a broader audience.</p>
            <div class="button-container">
                <a href="{{ route('contactUs') }}" class="btn btn-primary btn-lg">Request a Review&nbsp;&nbsp;<i class="bi bi-box-arrow-up-right"></i></a>
            </div> -->
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
                                        @foreach($book->reviews as $review)
                                            <span class="post-on">{{ $review->review_type }}&nbsp;&nbsp;|&nbsp;&nbsp;{{ $book->created_at->format('M d, Y') }}</span>
                                        @endforeach
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
                                        @foreach($book->reviews as $review)
                                            <span class="post-on">{{ $review->review_type }}&nbsp;&nbsp;|&nbsp;&nbsp;{{ $book->created_at->format('M d, Y') }}</span>
                                        @endforeach
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
                    <h5 class="mt-5 mb-30">Discover</h5>
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

<style>
    .author-featured-section {
        /* background-color: #f1f2f3; */
        margin-bottom: 30px;
    }
    
    .author-image-container {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .author-image-container img {
        max-height: 400px;
        object-fit: cover;
    }
    
    .section-title {
        font-weight: 700;
        color: #333;
        position: relative;
    }
    
    .section-title:after {
        content: '';
        display: block;
        width: 70px;
        height: 3px;
        background: #007bff;
        margin-top: 10px;
    }

    .author-subtitle {
        font-weight: 400;
        font-style: italic;
        color: #696969;
    }
    
    .author-description {
        font-size: 16px;
        line-height: 1.6;
    }
    
    @media (max-width: 768px) {
        .author-image-container img {
            max-height: 300px;
        }
    }
</style>

@endsection