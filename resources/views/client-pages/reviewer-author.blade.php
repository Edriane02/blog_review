@extends('layouts.app')
@section('title', 'Reviewed Books')

@section('contents')


<main class="bg-grey">
        <!--archive header-->
        <div class="archive-header pt-50">
            <div class="container">
                <h2 class="font-weight-900">Reviewed books by <span class="text-primary">Faustine Sinclair</span></h2>
                <div class="breadcrumb mb-25">
                    Showing 30 results
                </div>

                <div class="row">
                    <div class="col-12">
                        <!--author box-->
                        <div class="author-bio mb-50 bg-white p-30 border-radius-10">
                            <div class="author-image mb-30">
                                <a href="author.html"><img src="assets/imgs/ex-profile.jpg" alt="" class="avatar"></a>
                            </div>
                            <div class="author-info">
                                <h3 class="font-weight-900"><span class="vcard author"><span class="fn"><a href="author.html" title="Posts by Steven" rel="author">Faustine Sinclair</a></span></span>
                                </h3>
                                <h5 class="text-muted">About Me</h5>
                                <div class="author-description text-muted">I am a professional book reviewer with a deep passion for literature and a keen eye for detail. With years of experience in the literary world, I offer insightful and thoughtful critiques across various genres, helping readers discover their next great read.</div>
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
                                <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url('{{ asset('guestAssets/imgs/sample-book-1.jpg') }}');">
                                                    <a class="img-link" href="single-post.html"></a>
                                                </div>
                                                <ul class="social-share">
                                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="category-results.html"><span class="post-cat text-info">Fiction</span></a>
                                                    <a href="category-results.html"><span class="post-cat text-info">Mystery</span></a>
                                                </div>
                                                <h5 class="post-title font-weight-900 mb-20">
                                                    <a href="single-post.html">The Attenuating Puritan</a>
                                                    <br />
                                                    <span style="font-size: 13px;">Authored by Robert McGuiness</span>
                                                </h5>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">27 August 2024</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                                <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url('{{ asset('guestAssets/imgs/sample-book-2.jpg') }}');">
                                                    <a class="img-link" href="single-post.html"></a>
                                                </div>
                                                <ul class="social-share">
                                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="category-results.html"><span class="post-cat text-info">Non-Fiction</span></a>
                                                    <a href="category-results.html"><span class="post-cat text-info">Comedy</span></a>
                                                </div>
                                                <h5 class="post-title font-weight-900 mb-20">
                                                    <a href="single-post.html">Repairman</a>
                                                    <br />
                                                    <span style="font-size: 13px;">Authored by Jim Platt</span>
                                                </h5>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">27 August 2024</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                                <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url('{{ asset('guestAssets/imgs/sample-book-3.jpg') }}');">
                                                    <a class="img-link" href="single-post.html"></a>
                                                </div>
                                                <ul class="social-share">
                                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="category-results.html"><span class="post-cat text-info">Non-Fiction</span></a>
                                                    <a href="category-results.html"><span class="post-cat text-info">Novel</span></a>
                                                </div>
                                                <h5 class="post-title font-weight-900 mb-20">
                                                    <a href="single-post.html">You Have Time to Die and Go Broke</a>
                                                    <br />
                                                    <span style="font-size: 13px;">Authored by Linda Salerno-Forand</span>
                                                </h5>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">27 August 2024</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                                <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url('{{ asset('guestAssets/imgs/sample-book-4.jpg') }}');">
                                                    <a class="img-link" href="single-post.html"></a>
                                                </div>
                                                <ul class="social-share">
                                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="category-results.html"><span class="post-cat text-info">Biography</span></a>
                                                    <a href="category-results.html"><span class="post-cat text-info">Mystery</span></a>
                                                </div>
                                                <h5 class="post-title font-weight-900 mb-20">
                                                    <a href="single-post.html">Margarita - The Case of the Numbers Kidnapper (2nd Edition)</a>
                                                    <br />
                                                    <span style="font-size: 13px;">Authored by Michele Wallace Campanelli</span>
                                                </h5>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">27 August 2024</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                                <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url('{{ asset('guestAssets/imgs/sample-book-5.jpg') }}');">
                                                    <a class="img-link" href="single-post.html"></a>
                                                </div>
                                                <ul class="social-share">
                                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="category-results.html"><span class="post-cat text-info">Non-Fiction</span></a>
                                                    <a href="category-results.html"><span class="post-cat text-info">Mystery</span></a>
                                                </div>
                                                <h5 class="post-title font-weight-900 mb-20">
                                                    <a href="single-post.html">Hank - An "Angel Dog"</a>
                                                    <br />
                                                    <span style="font-size: 13px;">Authored by David O. Scheiding</span>
                                                </h5>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">27 August 2024</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                                <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url('{{ asset('guestAssets/imgs/sample-book-6.jpg') }}');">
                                                    <a class="img-link" href="single-post.html"></a>
                                                </div>
                                                <ul class="social-share">
                                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="category-results.html"><span class="post-cat text-info">Fiction</span></a>
                                                    <a href="category-results.html"><span class="post-cat text-info">True Crime</span></a>
                                                </div>
                                                <h5 class="post-title font-weight-900 mb-20">
                                                    <a href="single-post.html">A Girl with a Bad Reputation</a>
                                                    <br />
                                                    <span style="font-size: 13px;">Authored by Dave Gioia</span>
                                                </h5>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">27 August 2024</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                
                                
                            </div>
                        </div>
                        <div class="pagination-area mb-30 wow fadeInUp animated">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item"><a class="page-link" href="#"><i class="elegant-icon arrow_left"></i></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="elegant-icon arrow_right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </main>

@endsection