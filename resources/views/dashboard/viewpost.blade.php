@extends('layouts.app')
@section('title', 'Book Review')

@section('contents')

<main class="bg-grey pb-30">
    <div class="container single-content">
        <div class="entry-header entry-header-style-1 mb-50 pt-50">
            <h1 class="entry-title mb-50 font-weight-900">
                {{ $book->title }}
            </h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="entry-meta align-items-center meta-2 font-small color-muted">
                    <p style="font-size: 13px;" class="mb-5">
                                <a class="author-avatar" href="#"><img class="img-circle" src="assets/imgs/ex-profile.jpg" alt=""></a>
                                Reviewed by <span class="author-name font-weight-bold">
                                    @foreach($book->reviews as $review)
        @php
            $reviewer = $review->reviewer; // This is an integer (reviewer ID)
            // Fetch the actual reviewer object
            $actualReviewer = \App\Models\Reviewer::find($reviewer);
        @endphp
        
        {{ optional($actualReviewer)->reviewer_name ?? 'Unknown Reviewer' }}
        
    @endforeach
</span>
                            </p>
                        <span class="mr-10">{{ $book->created_at->format('d F Y') }}</span>
                    </div>
                </div>
                <div class="col-md-6 text-right d-none d-md-inline">
                    <ul class="header-social-network d-inline-block list-inline mr-15">
                        <li class="list-inline-item text-muted"><span>Share this: </span></li>
                        <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="elegant-icon social_twitter "></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--end single header-->
        <figure class="image mb-30 m-auto text-center border-radius-10">
            <img class="border-radius-10" src="{{ asset('storage/' . $book->banner) }}" alt="{{ $book->title }}" />
        </figure>
        <!--figure-->
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
                    <span><strong>Subtitle:</strong> N/A</span><br />
                    <span><strong>Author:</strong> {{ $book->author }}</span><br />
                    <span><strong>Publisher:</strong> {{ $book->publisher }}</span><br />
                    <span><strong>Pages:</strong> {{ $book->pages }}</span><br />
                    <span><strong>Genre:</strong> {{ $book->genre }}</span>
                </p>

                <!-- Links for purchase -->
                <div class="row">
                    <div class="col-auto mr-0">
                        <a href="https://www.amazon.com" target="_blank">
                            <img class="img-store-hover" src="assets/imgs/static/amazon-badge-comp.png" style="width: 120px; height: auto;">
                        </a>
                    </div>

                    <div>
                        <a href="https://www.barnesandnoble.com" target="_blank">
                            <img class="img-store-hover" src="assets/imgs/static/barns-noble-badge-comp.png" style="width: 120px; height: auto;">
                        </a>
                    </div>
                </div>
            </div>

            <div class="entry-bottom mt-50 mb-30 wow fadeIn animated">
                <div class="tags">
                    <span>Tags: </span>
                    @foreach($book->bookTag as $tag)
                        <a href="#" rel="tag">{{ $tag->book_tag }}</a>
                    @endforeach
                </div>
            </div>

            <div class="single-social-share clearfix wow fadeIn animated">
                    <ul class="header-social-network d-inline-block list-inline float-md-left mt-md-0 mt-4">
                        <li class="list-inline-item text-muted"><span>Share this: </span></li>
                        <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="elegant-icon social_twitter "></i></a></li>
                    </ul>
                </div>

                <!--author box-->
                <div class="author-bio p-30 mt-50 border-radius-10 bg-white wow fadeIn animated">
                    <div class="author-image mb-30">
                        <a href="author.html"><img src="assets/imgs/ex-profile.jpg" alt="" class="avatar"></a>
                    </div>
                    <div class="author-info">
                        <span style="font-weight: 700;">Reviewed by</span>
                        <h4 class="font-weight-bold mb-20"><span class="vcard author"><span class="fn"><a href="author.html" title="" rel="author">Faustine Sinclair</a></span></span>
                        </h4>
                        <div class="author-description text-muted">I am a professional book reviewer with a deep passion for literature and a keen eye for detail. With years of experience in the literary world, I offer insightful and thoughtful critiques across various genres, helping readers discover their next great read.</div>
                        <a href="author.html" class="author-bio-link mb-md-0 mb-3">View All Reviews</a>
                        <div class="author-social">
                            <ul class="author-social-icons">
                                <li class="author-social-link-facebook"><a href="#" target="_blank"><i class="ti-facebook"></i></a></li>
                                <li class="author-social-link-twitter"><a href="#" target="_blank"><i class="ti-twitter-alt"></i></a></li>
                                <li class="author-social-link-pinterest"><a href="#" target="_blank"><i class="ti-pinterest"></i></a></li>
                                <li class="author-social-link-instagram"><a href="#" target="_blank"><i class="ti-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </article>
    </div>
</main>


@endsection