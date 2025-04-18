@extends('layouts.sidebar')
@section('title', 'New Post')

@section('contents')

<div class="page-content">
@include('partials.sweetalert')

                <!-- Page title start -->
                <div class="page-title-box">
                    <div class="container-fluid">
                     <div class="row align-items-center">
                         <div class="col-sm-6">
                             <div class="page-title">
                                 <h1 class="page-title-custom">Add New Post</h1>  
                             </div>
                         </div>

                         <div class="col-sm-6">
                            <div class="float-end d-sm-block">
                                <a href="{{ route('posts') }}" type="button" class="btn btn-primary waves-effect waves-light"><i class="bi bi-arrow-left"></i>&nbsp;Back to All Posts</a>
                            </div>
                        </div>
                     </div>
                    </div>
                 </div>
                 <!-- Page title end -->

                <div class="container-fluid">
                    <div class="page-content-wrapper">
                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <!-- Form start -->
                                <form method="POST" action="{{ route('uploadPost') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- Required field indicator -->
                                            <p style="font-size: 12px;" class="mb-3"><span class="text-danger">*</span> Indicates required field.</p>

                                                    <h4 class="card-title font-size-16 mt-0"></h4>
                                                    <span class="badge bg-primary mb-2">STEP 1</span>
                                                    <h4>Upload a Post Banner <span class="text-danger">*</span></h4>
                                                    <p class="text-muted">containing the Book Mockup</p>
                                                    <div class="upload-container mb-3" id="uploadContainer">
                                                        <input class="form-control" type="file" name="banner" id="fileInput" accept="image/*" required>
                                                    </div>

                                                    <div class="mb-4">
                                                        <div class="alert alert-info" role="alert">
                                                        <strong><i class="bi bi-info-circle"></i>&nbsp;&nbsp;Recommended image size in pixels (WxH):</strong> 1000x600 or <strong>Aspect ratio:</strong> 16:9
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- REVIEW TYPE -->
                                                    <span class="badge bg-primary mb-2">STEP 2</span>
                                                    <h4 class="mb-3">Review Type <span class="text-danger">*</span></h4>
                                                    <div class="mb-4">
                                                        <select class="form-control" name="review_type" required>
                                                            <option>Select Reviewer...</option>
                                                            <option value="Book Review" selected>Book Review</option>
                                                            <option value="Magazine Review">Magazine Review</option>
                                                            <option value="Screenplay Review">Screenplay Review</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <span class="badge bg-primary mb-3">STEP 3</span>
                                                        <h4>Add Review Headline <span class="text-danger">*</span></h4>
                                                        <p class="text-muted">Enter a short and compelling headline for the review. This will appear at the top of the page and should grab readers' attention.</p>
                                                        <div class="mb-3">  
                                                            <input class="form-control" name="review_title" type="text" id="book-review-title" required>
                                                        </div>
                                                    </div>

                                                    <span class="badge bg-primary mb-2">STEP 4</span>
                                                    <h4 class="mb-2">Write Your Review <span class="text-danger">*</span></h4>
                                                    <!-- How to add links modal button -->
                                                    <button type="button" class="text-primary text-decoration-underline bg-transparent border-0 p-0 mb-4" data-bs-toggle="modal"
                                                            data-bs-target=".howToAddLink"><i class="bi bi-question-circle"></i> Learn how to add links below
                                                        </button>

                                                    <div class="mb-4">
                                                        <textarea id="elm1" name="review[]"></textarea>
                                                    </div>

                                                    <span class="badge bg-primary mb-2">STEP 5</span>
                                                    <h4 class="mb-3">Add Reviewer <span class="text-danger">*</span></h4>
                                                    <div class="mb-4">
                                                        <select class="form-control select2" name="reviewer[]" required>
                                                            <option>Select Reviewer...</option>
                                                            @foreach($reviewers as $reviewer)
                                                            <option value="{{ $reviewer->id }}">{{ $reviewer->reviewer_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-4">
                                                        <span class="badge bg-primary mb-2">STEP 6</span>
                                                        <h4>Add Tags <span class="text-danger">*</span></h4>
                                                        <p class="text-muted">(You can select multiple tags, like Fiction, Mystery, and more...)</p>
                                                        <select class="select2 form-control select2-multiple" name="book_tag[]" multiple="multiple" data-placeholder="Choose tags..." required>
                                                            @foreach($tags as $tag)
                                                                <option value="{{ $tag->tag }}">{{ $tag->tag }}</option>
                                                            @endforeach
                                                        </select>   
                                                    </div>

                                                    <span class="badge bg-primary mb-2">STEP 7</span>
                                                    <h4 class="mb-3">Input Book Information</h4>
                                                    <div class="row"> 
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="bookTitle" class="form-label">Book Title <span class="text-danger">*</span></label>
                                                                <input type="text" name="title" class="form-control" id="bookTitle" placeholder="" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="bookSubtitle" class="form-label">Subtitle</label>
                                                                <input type="text" name="subtitle" class="form-control" id="bookSubtitle" placeholder="">
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="bookAuthor" class="form-label">Author(s) <span class="text-danger">*</span></label>
                                                                <input type="text" name="book_author" class="form-control" id="bookAuthor" placeholder="(e.g. Author 1, Author 2, ...)" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="bookPublisher" class="form-label">Publisher <span class="text-danger">*</span></label>
                                                                <input type="text" name="publisher" class="form-control" id="bookPublisher" placeholder="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="bookPages" class="form-label">Pages <span class="text-danger">*</span></label>
                                                                <input type="text" name="pages" class="form-control" id="bookPages" placeholder="" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-4">
                                                                <label for="bookGenre" class="form-label">Genre <span class="text-danger">*</span></label>
                                                                <input type="text" name="genre" class="form-control" id="bookGenre" placeholder="(e.g. Fiction, Mystery, ...etc.)" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <span class="badge bg-primary mb-2">STEP 8</span>
                                                        <h4 class="mb-3">Add Online Store Links of the Book</h4>
                                                        <div class="mb-3">
                                                            <label for="amazon-s-link">Amazon Link</label>
                                                            <input class="form-control" name="amazon_link" type="text" value="" placeholder="Paste the link here..." id="amazon-s-link">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="barnes-s-link">Barnes & Noble Link</label>
                                                            <input class="form-control" name="barnes_noble_link" type="text" value="" placeholder="Paste the link here..." id="barnes-s-link">
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light mb-3">Publish</button>
                                                    </div>
                                                    
                                                    <!-- Include how to add links modal -->
                                                    @include('modals.how-to-add-link')

                                        </div> <!-- /.card-body -->
                                </form> <!-- Form end -->
                            </div> <!-- /.col-xl-10 -->
                        </div> <!-- /.row justify-content-center -->
                    </div> <!-- /.page-content-wrapper -->
                </div> <!-- /.container-fluid -->
</div> <!-- /.page-content -->

@endsection