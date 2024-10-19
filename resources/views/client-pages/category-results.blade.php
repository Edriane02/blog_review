@extends('layouts.app')
@section('title', 'Tag Search')

@section('contents')

<main>
        <!--archive header-->
        <div class="archive-header pt-50">
            <div class="container">
                <span style="color: #6e6e6e;"><strong>Tag Search</strong></span><br />
                <h2 class="font-weight-900">{{ $tag->tag }}</h2>
                <div class="breadcrumb">
                Showing {{ $books->total() }} results</strong>
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
                <p>No results found for this category.</p>
            @else
            @foreach($books as $book)
            <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url('{{ asset('storage/' . $book->banner) }}');">
                                                    <a class="img-link" href="single-post.html"></a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                @foreach($book->bookTag as $tag)
                                                    <a href="category-results.html"><span class="post-cat text-info">{{ $tag->book_tag }}</span></a>
                                                    @endforeach
                                                </div>
                                                <h5 class="post-title font-weight-900 mb-20">
                                                    <a href="single-post.html">{{ $book->title }}</a>
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
                    <div class="pagination-area mb-30 wow fadeInUp animated">
                        {{ $books->links('pagination::bootstrap-4') }}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection