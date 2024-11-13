@extends('layouts.app')
@section('title', 'Reviewed Books')

@section('contents')

<main class="bg-grey">
        <!-- Archive header -->
        <div class="archive-header pt-50">
            <div class="container">
                <h3 class="font-weight-900">Reviewed books by {{ $reviewer->reviewer_name }}</h3>
                <div class="breadcrumb mb-25">
                    Showing {{ $reviews->total() }} results
                </div>

                <div class="row">
                    <div class="col-12">
                        <!-- Author box -->
                        <div class="author-bio mb-50 bg-white p-30 border-radius-10">
                            <div class="author-image mb-30">
                                <img src="{{ asset('storage/' . ($reviewer->photo ?? 'static/default_photo.jpg')) }}" alt="" class="avatar">
                            </div>
                            <div class="author-info">
                                <h3 class="font-weight-900"><span class="vcard author"><span class="fn">{{ $reviewer->reviewer_name }}</span></span>
                                </h3>
                                <h5 class="text-muted">About</h5>
                                <div class="author-description text-muted">{{ optional($reviewer)->bio ?? 'No bio yet.' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="bt-1 border-color-1 mt-30 mb-50"></div> -->
            </div>
        </div>
        <div class="pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="post-module-3">
                            <div class="loop-list loop-list-style-1">
                            @if($reviews->isEmpty())
                                <div class="alert alert-info" role="alert"><h6><i class="bi bi-emoji-frown"></i>&nbsp;&nbsp;No results found.</h6></div>
                            @else
                            @foreach($reviews as $review)
                                <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url('{{ asset('storage/' . $review->book->banner) }}');">
                                                    <a class="img-link" href="{{ route('viewPost', $review->book->id) }}"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    @foreach($review->book->bookTag as $tag)
                                                    <span class="post-cat text-info">{{ $tag->book_tag }}</span>
                                                    @endforeach
                                                </div>
                                                <h5 class="post-title font-weight-900 mb-20">
                                                    <a href="{{ route('viewPost', $review->book->id) }}">{{ $review->book->title }}</a>
                                                    <br />
                                                    <span style="font-size: 13px;">Authored by {{ $review->book->book_author }}</span>
                                                </h5>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">{{ $review->created_at->format('F j, Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- Pagination -->
                        <div class="pagination-area mb-30 wow fadeInUp animated">
                            {{ $reviews->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </main>

@endsection