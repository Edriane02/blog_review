@extends('layouts.app')
@section('title', 'Search Results')

@section('contents')

<main>
        <!--archive header-->
        <div class="archive-header pt-50">
            <div class="container">
                <h2 class="font-weight-900">Search results</h2>
                <div class="breadcrumb">
                    We found {{ $books->total() }} professional reviews for <strong>"{{ $searchQuery }}"</strong>
                </div>
                <div class="bt-1 border-color-1 mt-30 mb-50"></div>
            </div>
        </div>
        <div class="pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="post-module-3">
                            <div class="loop-list loop-list-style-1">
                            @if($books->isEmpty())
                                
                                <div class="alert alert-info" role="alert">No results found.</div>
                            @else
                            @foreach($books as $book)
                                <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url('{{ asset('storage/' . $book->banner) }}');">
                                                    <a class="img-link" href="{{ route('viewPost', $book->id) }}"></a>
                                                </div>
                                                <!-- <ul class="social-share">
                                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                                </ul> -->
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
                                                    <span class="post-on">{{ $book->created_at->format('j F Y') }}</span>
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
                    <!-- Pagination -->
<div class="pagination-area mb-30 wow fadeInUp animated">
    {{ $books->appends(['query' => request('query')])->links('pagination::bootstrap-4') }}
</div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection