@extends('layouts.app')
@section('title', $book->title)
{{-- @section('title', $book->title . ' by ' . $book->book_author) --}}

@section('contents')

    <main class="bg-grey pb-30">
        <div class="container single-content">
            <div class="entry-header entry-header-style-1 mb-50 pt-50">
                @foreach($book->reviews as $review)
                    <p class="custom-small-heading text-muted text-center"><b>{{ $review->review_type }}</b></p>
                @endforeach
                <h1 class="entry-title fancy-font entry-title-custom-font text-center">
                    {{ $book->title }}
                </h1>
                <p class="text-center text-muted"><b>by {{ $book->book_author }}</b></p>
                <hr style="border: 1.5px solid #B3876E;">
                    @foreach($book->reviews as $review)
                        <h2 class="fancy-font text-center">{{ $review->review_title }}</h2>
                    @endforeach
                    <center>
                        <div class="entry-meta align-items-center meta-2 font-small color-muted">
                            <p style="font-size: 13px;" class="mb-5">
                                @foreach($book->reviews as $review)
                                    @php
        $reviewer = $review->reviewer;
        $actualReviewer = \App\Models\Reviewer::find($reviewer);
                                    @endphp
                                        Reviewed by <span class="author-name">{{ optional($actualReviewer)->reviewer_name ?? 'Unknown Reviewer' }}</span>
                                @endforeach
                            </p>
                            <span class="mr-10">{{ $book->created_at->format('M d, Y') }}</span>
                        </div>
                    </center>
            </div>

            <figure class="image mb-30 m-auto text-center border-radius-10">
                <img class="border-radius-10" src="{{ asset('storage/' . $book->banner) }}" alt="Post banner" />
            </figure>
            <br />

            <article class="entry-wraper mb-50">
                <div class="entry-main-content dropcap wow fadeIn animated">
                    @foreach($book->reviews as $review)
                        {!! $review->review !!}
                    @endforeach
                </div>

                <!-- Book Information Card -->
                <div class="p-30 mt-50 border-radius-10 bg-white wow fadeIn animated">
                    <p>
                        <span style="font-size: 17px; font-weight: 700;">Book Information</span><br />
                        <span><strong>Title:</strong> {{ $book->title }}</span><br />
                        <span><strong>Subtitle:</strong> {{ $book->subtitle }}</span><br />

                        @php
    $authors = explode(',', $book->book_author);
    $authorLabel = count($authors) > 1 ? 'Authors' : 'Author';
                        @endphp

                        <span><strong>{{ $authorLabel }}:</strong> {{ implode(', ', $authors) }}</span><br />
                        <span><strong>Publisher:</strong> {{ $book->publisher }}</span><br />
                        <span><strong>Pages:</strong> {{ $book->pages }}</span><br />
                        <span><strong>Genre:</strong> {{ $book->genre }}</span>
                    </p>

                    <p class="mb-2" style="font-size: 17px; font-weight: 700;">Shop Now</p>
                    <div class="row">
                        <div class="col-auto mr-0">
                            <a href="{{ $book->amazon_link }}" target="_blank">
                                <img class="img-store-hover" src="{{ asset('guestAssets/imgs/static/amazon-badge-comp.png') }}" style="width: 120px; height: auto;" alt="Amazon store badge">
                            </a>
                        </div>

                        <div>
                            <a href="{{ $book->barnes_noble_link }}" target="_blank">
                                <img class="img-store-hover" src="{{ asset('guestAssets/imgs/static/barns-noble-badge-comp.png') }}" style="width: 120px; height: auto;" alt="Barnes and Noble store badge">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="entry-bottom mt-50 mb-30 wow fadeIn animated">
                    <div class="tags">
                        <span><i class="bi bi-tags"></i> Tags: </span>
                        @foreach($book->bookTag as $key => $tag)
                            <span><i>{{ $tag->book_tag }}{{ $key != $book->bookTag->count() - 1 ? ',' : '' }}</i></span>
                        @endforeach
                    </div>
                </div>

                <!-- Author box -->
                <div class="author-bio p-30 mt-50 border-radius-10 bg-white wow fadeIn animated">
                    @foreach($book->reviews as $review)
                        @php
        $reviewer = $review->reviewer;
        $actualReviewer = \App\Models\Reviewer::find($reviewer);
                        @endphp

                        <div class="author-image mb-30">
                            <a href="{{ route('reviewerReviews', $actualReviewer->id) }}">
                                <img src="{{ asset('storage/' . ($actualReviewer->photo ?? 'static/default_photo.jpg')) }}" alt="Reviewer's photo" class="avatar">
                            </a>
                        </div>

                        <div class="author-info">
                            <span style="font-weight: 700;">Reviewed by</span>
                            <h4 class="font-weight-bold mb-20">
                                <span class="vcard author">
                                    <span class="fn">
                                        <a href="{{ route('reviewerReviews', $actualReviewer->id) }}" title="" rel="author">
                                            {{ optional($actualReviewer)->reviewer_name ?? 'Unknown Reviewer' }}
                                        </a>
                                    </span>
                                </span>
                            </h4>
                            <div class="author-description text-muted">{{ optional($actualReviewer)->bio ?? 'No bio yet.' }}</div>
                            <a href="{{ route('reviewerReviews', $actualReviewer->id) }}" class="author-bio-link mb-md-0 mb-3">View All Reviews</a>
                        </div>
                    @endforeach
                </div>
            </article>
        </div>
    </main>

    <!-- Browse by Tags -->
    <div class="site-bottom pt-50 pb-50">
        <div class="container">
            <div class="row"></div>
                <div>
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
        </div> <!-- /.container -->
    </div>

@endsection