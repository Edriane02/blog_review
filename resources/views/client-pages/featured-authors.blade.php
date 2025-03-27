@extends('layouts.app')
@section('title', 'Featured Authors')

@section('contents')

    <main>
        <div class="archive-header pt-50">
            <div class="container">
                <h2 class="fancy-font">Featured Authors</h2>
                <div class="breadcrumb">
                    Discover the authors behind the books you love, featured for their impact on readers and the literary world.
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
                            @php
                                $visibleAuthors = $featuredAuthors->filter(fn($author) => $author->status !== 'Hidden');
                            @endphp

                            @if($visibleAuthors->count() > 0)
                                @foreach($visibleAuthors as $featuredAuthor)
                                    <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                        <div class="row mb-40 list-style-2">
                                            <div class="col-md-4">
                                                <div class="post-thumb position-relative border-radius-5">
                                                    <div class="img-hover-slide border-radius-5 position-relative"
                                                        style="background-image: url({{ asset('storage/' . $featuredAuthor->img_banner) }})">
                                                        <a class="img-link" href="{{ route('featured.author', $featuredAuthor->id) }}"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 align-self-center">
                                                <div class="post-content">
                                                    <h5 class="post-title font-weight-900">
                                                        <a href="{{ route('featured.author', $featuredAuthor->id) }}">{{ $featuredAuthor->author_name }}</a>
                                                    </h5>
                                                    <p style="color: #696969; font-style: italic; margin-bottom: 3px;">
                                                        <b>{{ $featuredAuthor->headline }}</b></p>
                                                    <div class="text-muted">
                                                        {!! \Illuminate\Support\Str::limit($featuredAuthor->body_text, 250) !!}
                                                    </div>
                                                    <div class="mb-3">
                                                        <a href="{{ route('featured.author', $featuredAuthor->id) }}" class="btn btn-sm btn-info"
                                                            style="font-size: 12px;">Read more&nbsp;&nbsp;<i class="bi bi-arrow-right"></i></a>
                                                    </div>
                                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                        <span class="post-on">{{ $featuredAuthor->created_at->format('M d, Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach

                                <!-- Pagination -->
                                <div class="pagination-area mb-30 wow fadeInUp animated">
                                    {{ $featuredAuthors->links('pagination::bootstrap-4') }}
                                </div>

                            @else
                                <div class="alert alert-info" role="alert">
                                    <h6><i class="bi bi-emoji-frown"></i>&nbsp;&nbsp;No featured authors yet.</h6>
                                </div>
                                <br /><br /><br />
                            @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection