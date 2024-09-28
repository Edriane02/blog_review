@extends('layouts.sidebar')
@section('title', 'Reviewers')

@section('contents')

<div class="page-content">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="container-fluid">
                     <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title">
                                <h1 class="page-title-custom">Reviewers</h1>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-end d-sm-block">
                                <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".addReviewerModal">Add New Reviewer</button>
                            </div>
                        </div>
                     </div>
                    </div>
                 </div>
                 <!-- end page title -->

                <div class="container-fluid">
                    <div class="page-content-wrapper">
                        <div class="row justify-content-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>Photo</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <tr>
                                                    <td>
                                                        <img class="rounded-circle reviewer-profile" src="../assets/imgs/ex-profile.jpg" alt="Header Avatar">
                                                    </td>
                                                    <td>
                                                        <strong>Faustine Sinclair</strong></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".editReviewerModal"><i class="bi bi-pencil-square"></i></button>&nbsp;
                                                            <button class="btn btn-sm btn-danger" onclick="if(confirm('Are you sure you want to delete this reviewer?')) { /* Add delete action here */ }"><i class="bi bi-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>

                        <!-- Add New Reviewer Modal -->
                        <div class="modal fade addReviewerModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addReviewerModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0" id="addReviewerModalLabel">Add New Reviewer</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    
                                    <form method="POST" action="{{ route('addReviewer') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <!-- Form Start -->
                                            <p><strong>Upload Reviewer's Photo</strong></p>
                                            <div class="upload-container mb-3" id="uploadContainer">
                                                <input type="file" name="photo" id="fileInput" accept="image/*" class="hidden">
                                                <div class="upload-area" id="uploadArea">
                                                    <h1 class="text-muted"><i class="bi bi-cloud-arrow-up"></i></h1>
                                                    <p>Drag & Drop your image here or <span id="browseText">browse</span></p>
                                                </div>
                                                <img id="previewImage" class="hidden" alt="Image Preview">
                                            </div>
    
                                            <div class="mb-3">
                                                <label for="revname">Reviewer Name</label>
                                                <input class="form-control" name="reviewer_name" type="text" placeholder="Enter name..." id="revname">
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="aboutme">About Me</label>
                                                <textarea rows="6" name="bio" id="aboutme" class="form-control" placeholder="Enter reviewer's bio here..."></textarea>
                                            </div>
                                    </div>
                                    
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Add Reviewer</button>
                                            </div>
                                        </form>
                                        <!-- Form End -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- End of Add New Reviewer Modal -->

                        <!-- Edit Reviewer Modal -->
                        <div class="modal fade editReviewerModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editReviewerModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0" id="editReviewerModalLabel">Edit Reviewer's Information</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('editReviewer') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <!-- Form Start -->
                                            <p><strong>Upload Reviewer's Photo</strong></p>
                                            <div class="upload-container mb-3" id="uploadContainer">
                                                <input type="file" name="photo" id="fileInput" accept="image/*">
                                                <div class="upload-area" id="uploadArea">
                                                    <h1 class="text-muted"><i class="bi bi-cloud-arrow-up"></i></h1>
                                                    <p>Drag & Drop your image here or <span id="browseEditText">browse</span></p>
                                                </div>
                                                <img id="previewImage" class="hidden" alt="Image Preview" placeholder="{{ $reviewer->photo }}">
                                            </div>
  
                                            <div class="mb-3">
                                                <label for="revname">Reviewer Name</label>
                                                <input class="form-control" name="reviewer_name" type="text" value="Faustine Sinclair" placeholder="{{ $reviewer->reviewer_name }}" id="revname">
                                            </div>

                                            <div class="mb-3">
                                                <label for="aboutme">About Me</label>
                                                <textarea rows="6" name="bio" id="aboutme" class="form-control" placeholder="{{ $reviewer->bio }}">I am a professional book reviewer with a deep passion for literature and a keen eye for detail. With years of experience in the literary world, I offer insightful and thoughtful critiques across various genres, helping readers discover their next great read.</textarea>
                                            </div>
                                    </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                            </div>
                                        </form>
                                        <!-- Form End -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- End of Edit Reviewer Modal -->
                    </div>
                </div> <!-- container-fluid -->
            </div>

<script>
    document.getElementById('browseText').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});
</script>
            
@endsection