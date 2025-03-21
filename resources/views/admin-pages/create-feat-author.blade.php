@extends('layouts.sidebar')
@section('title', 'Add Featured Author')

@section('contents')

    <div class="page-content">
    @include('partials.sweetalert')

                    <!-- Page title start -->
                    <div class="page-title-box">
                        <div class="container-fluid">
                         <div class="row align-items-center">
                             <div class="col-sm-6">
                                 <div class="page-title">
                                     <h1 class="page-title-custom">Add New Featured Author</h1>
                                     <p>This author will be featured at the top of the website's homepage.</p>
                                 </div>
                             </div>

                             <div class="col-sm-6">
                                <div class="float-end d-sm-block">
                                    <a href="{{ route('featured_authors.index') }}" type="button" class="btn btn-success waves-effect waves-light"><i class="bi bi-arrow-left"></i>&nbsp;Back to Featured Authors</a>
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
                                    <form method="POST" action="{{ route('featured_authors.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- Required field indicator -->
                                                <p style="font-size: 12px;" class="mb-3"><span class="text-danger">*</span> Indicates required field.</p>

                                                        <h4 class="card-title font-size-16 mt-0"></h4>
                                                        <span class="badge bg-primary mb-2">STEP 1</span>
                                                        <h4>Upload Image <span class="text-danger">*</span></h4>
                                                        <p class="text-muted">For example, an author portrait/image, the author holding their book, etc.</p>
                                                        <div class="upload-container mb-3" id="uploadContainer">
                                                            <input class="form-control" type="file" name="img_banner" id="fileInput" accept="image/*" required>
                                                        </div>

                                                        <div class="mb-4">
                                                            <div class="alert alert-info" role="alert">
                                                                <strong><i class="bi bi-info-circle"></i>&nbsp;&nbsp;Recommended image size in pixels (WxH):</strong> 1000x600 or <strong>Aspect ratio:</strong> 16:9
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <span class="badge bg-primary mb-3">STEP 2</span>
                                                            <h4>Author's Name <span class="text-danger">*</span></h4>
                                                            <p class="text-muted">This will appear at the top of the post page.</p>
                                                            <div class="mb-3">  
                                                                <input class="form-control" name="author_name" type="text" id="book-review-title" required>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <span class="badge bg-primary mb-3">STEP 3</span>
                                                            <h4>Add Headline <span class="text-danger">*</span></h4>
                                                            <p class="text-muted">Enter a short and compelling headline for the author. This will appear at the top of the page and should grab readers' attention.</p>
                                                            <div class="mb-3">  
                                                                <input class="form-control" name="headline" type="text" id="book-review-title" required>
                                                            </div>
                                                        </div>

                                                        <span class="badge bg-primary mb-2">STEP 4</span>
                                                        <h4>About the Author <span class="text-danger">*</span></h4>
                                                        <p class="text-muted mb-0">You can also highlight the author's background and style by describing them through their work(s).</p>

                                                        <!-- How to add links modal button -->
                                                        <button type="button" class="text-primary text-decoration-underline bg-transparent border-0 p-0 mb-4" data-bs-toggle="modal"
                                                            data-bs-target=".howToAddLink"><i class="bi bi-question-circle"></i> Learn how to add links below
                                                        </button>

                                                        <div class="mb-4">
                                                            <textarea id="elm1" name="body_text[]"></textarea>
                                                        </div>

                                                        <!-- STATUS -->
                                                        <span class="badge bg-primary mb-2">STEP 5</span>
                                                        <h4 class="mb-3">Visibility <span class="text-danger">*</span></h4>
                                                        <p class="text-muted">Only one author can be featured at a time. For the <b>Archived</b> option, it will be listed on the Featured Authors page.</p>
                                                        <div class="mb-4">
                                                            <select class="form-control" name="status" required>
                                                                <option>Select Reviewer...</option>
                                                                <option value="Featured" selected>Featured</option>
                                                                <option value="Listed">Listed</option>
                                                                <option value="Hidden">Hidden</option>
                                                            </select>
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