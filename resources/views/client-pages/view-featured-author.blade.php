@extends('layouts.app')
@section('title', $author->author_name . ' - Featured Author')

@section('contents')

    <main class="bg-grey pb-30">
        <div class="container single-content">
            <div class="entry-header entry-header-style-1 mb-50 pt-50">
                <p class="custom-small-heading text-muted text-center"><b>Featured Author</b></p>

                <h1 class="entry-title fancy-font entry-title-custom-font text-center">
                    {{ $author->author_name }}
                </h1>
                <hr style="border: 1.5px solid #B3876E;">
                <h2 class="fancy-font text-center mb-15">{{ $author->headline }}</h2>

                <center>
                    <div class="entry-meta align-items-center meta-2 font-small color-muted">
                        <span class="mr-10">{{ $author->created_at->format('M d, Y') }}</span>
                    </div>
                </center>
            </div>

            <figure class="image mb-30 m-auto text-center border-radius-10">
                <img class="border-radius-10" src="{{ asset('storage/' . $author->img_banner) }}"
                    alt="{{ $author->author_name }}" />
            </figure>
            <br />

            <article class="entry-wraper mb-50">
                <div class="entry-main-content dropcap wow fadeIn animated">
                    {!! $author->body_text !!}
                </div>
            </article>
        </div>
    </main>

    <!-- Browse by Tags -->
    <div class="site-bottom pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div>
                    <div class="sidebar-widget widget_tagcloud wow fadeInUp animated mb-30" data-wow-delay="0.2s">
                        <div class="widget-header-2 position-relative mb-30">
                            <h5 class="mt-5 mb-30">Discover</h5>
                        </div>
                        <div class="tagcloud mt-50">
                            @if(isset($tags) && $tags->count() > 0)
                                @foreach($tags as $tag)
                                    <a class="tag-cloud-link"
                                        href="{{ route('categorySearch', ['tagId' => $tag->id]) }}">{{ $tag->tag }}</a>
                                @endforeach
                            @else
                                <div class="alert alert-info" role="alert">
                                    No tags found.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.container -->
    </div>

@endsection