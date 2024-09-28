@extends('layouts.sidebar')
@section('title', 'New Post')

@section('contents')

<div class="page-content">
                <!-- start page title -->
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
                                <a href="posts.html" type="button" class="btn btn-success waves-effect waves-light"><i class="bi bi-arrow-left"></i>&nbsp;Back to All Posts</a>
                            </div>
                        </div>
                     </div>
                    </div>
                 </div>
                 <!-- end page title -->

                <div class="container-fluid">
                    <div class="page-content-wrapper">
                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title font-size-16 mt-0"></h4>

                                                <!-- Form Start -->
                                                <form method="POST" action="">
                                                    @csrf
                                                    <input class="hidden" name="post_id">
                                                    <span class="badge bg-primary mb-2">STEP 1</span>
                                                    <h4>Upload a Post Banner</h4>
                                                    <p class="text-muted">containing the Book Mockup</p>
                                                    <div class="upload-container mb-3" id="uploadContainer">
                                                        <input type="file" name="banner" id="fileInput" accept="image/*" hidden >
                                                        <div class="upload-area" id="uploadArea">
                                                            <h1 class="text-muted"><i class="bi bi-cloud-arrow-up"></i></h1>
                                                            <p>Drag & Drop your image here or <span id="browseText">browse</span></p>
                                                        </div>
                                                        <img id="previewImage" class="hidden" alt="Image Preview">
                                                    </div>

                                                    <div class="mb-4">
                                                        <div class="alert alert-info" role="alert">
                                                            <strong><i class="bi bi-info-circle"></i>&nbsp;&nbsp;Recommended image size:</strong> 1000x600.
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <span class="badge bg-primary mb-3">STEP 2</span>
                                                        <h4>Add Book Title</h4>
                                                        <p class="text-muted">This will appear at the top of the post page and will serve as the review title.</p>
                                                        <div class="mb-3">  
                                                            <input class="form-control" name="title" type="text" value="" placeholder="Enter book title here..." id="book-review-title">
                                                        </div>
                                                    </div>

                                                    <span class="badge bg-primary mb-2">STEP 3</span>
                                                    <h4 class="mb-3">Write Your Review</h4>
                                                    <div class="mb-4">
                                                        <textarea id="elm1" name="area" required></textarea>
                                                    </div>

                                                    <span class="badge bg-primary mb-2">STEP 4</span>
                                                    <h4 class="mb-3">Add Reviewer</h4>
                                                    <div class="mb-4">
                                                        <select class="form-control select2">
                                                            <option>Select Reviewer...</option>
                                                                <option value="Faustine Sinclair">Faustine Sinclair</option>
                                                                <option value="Simon Jenkins">Simon Jenkins</option>
                                                                <option value="Cath Reigo">Cath Reigo</option>
                                                                <option value="John Doe">John Doe</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-4">
                                                        <span class="badge bg-primary mb-2">STEP 5</span>
                                                        <h4>Add Tags</h4>
                                                        <p class="text-muted">(You can select multiple tags, like Fiction, Mystery, and more...)</p>
                                                        <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose tags..." required>
                                                            <option value="Fiction">Fiction</option>
                                                            <option value="Non-Fiction">Non-Fiction</option>
                                                            <option value="Mystery">Mystery</option>
                                                            <option value="Comedy">Comedy</option>
                                                            <option value="Novel">Novel</option>
                                                            <option value="Biography">Biography</option>
                                                            <option value="True Crime">True Crime</option>
                                                        </select>
                                                    </div>

                                                    <span class="badge bg-primary mb-2">STEP 6</span>
                                                    <h4 class="mb-3">Input Book Information</h4>
                                                    <div class="row">  
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="bookSubtitle" class="form-label">Subtitle (optional)</label>
                                                                <input type="text" class="form-control" id="bookSubtitle" placeholder="">
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="bookAuthor" class="form-label">Author</label>
                                                                <input type="text" class="form-control" id="bookAuthor" placeholder="" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="bookPublisher" class="form-label">Publisher</label>
                                                                <input type="text" class="form-control" id="bookPublisher" placeholder="" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="bookPages" class="form-label">Pages</label>
                                                                <input type="text" class="form-control" id="bookPages" placeholder="" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-4">
                                                                <label for="bookGenre" class="form-label">Genre</label>
                                                                <input type="text" class="form-control" id="bookGenre" placeholder="" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <span class="badge bg-primary mb-2">STEP 7</span>
                                                        <h4 class="mb-3">Add Online Store Links of the Book</h4>
                                                        <div class="mb-3">
                                                            <label for="amazon-s-link">Amazon Link</label>
                                                            <input class="form-control" type="text" value="" placeholder="Paste the link here..." id="amazon-s-link">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="barnes-s-link">Barnes & Noble Link</label>
                                                            <input class="form-control" type="text" value="" placeholder="Paste the link here..." id="barnes-s-link">
                                                        </div>
                                                    </div>
                                                    <br />
                                                    <div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light mb-3">Publish</button>
                                                    </div>           
                                                </form>
                                                <!-- Form End -->
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div> <!-- container-fluid -->
            </div>
            

@endsection