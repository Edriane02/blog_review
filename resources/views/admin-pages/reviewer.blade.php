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
                                                @if($reviewer->count() > 0)
                                                @foreach($reviewer as $reviewers)

                                                <tr>
                                                    <td>
                                                    <img class="rounded-circle reviewer-profile" src="{{ asset('storage/' . $reviewers->photo) }}" alt="Reviewer Avatar">
                                                    </td>
                                                    <td>
                                                        <strong>{{ $reviewers->reviewer_name }}</strong></td>
                                                    <td>
                                                        <div class="d-flex">
                                                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#editReviewerModal-{{ $reviewers->id }}">
    <i class="bi bi-pencil-square"></i>
</button>&nbsp;

                                                            <button class="btn btn-sm btn-danger" onclick="if(confirm('Are you sure you want to delete this reviewer?')) { /* Add delete action here */ }"><i class="bi bi-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td class="text-center">No reviewers found.</td>
                                                </tr>
                                                @endif
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
                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                        @foreach ($reviewer as $reviewers)
    <!-- Edit Reviewer Modal -->
    <div class="modal fade" id="editReviewerModal-{{ $reviewers->id }}" tabindex="-1" aria-labelledby="editReviewerLabel-{{ $reviewers->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="editReviewerModalLabel-{{ $reviewers->id }}">Edit Reviewer's Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('editReviewer') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- Form Start -->
                        <p><strong>Upload/Replace Reviewer's Photo</strong></p>
                        <center>
                            <img class="rounded-circle mb-3" src="{{ asset('storage/' . $reviewers->photo) }}" width="200" alt="Reviewer Photo">
                        </center>
                        <div class="upload-container mb-3" id="uploadContainer-{{ $reviewers->id }}">
                            <input class="hidden" type="file" name="photo" id="fileInput-{{ $reviewers->id }}" accept="image/*" >
                            <div class="upload-area" id="uploadArea-{{ $reviewers->id }}">
                                <h1 class="text-muted"><i class="bi bi-cloud-arrow-up"></i></h1>
                                <p>Drag & Drop your image here or <span id="browseEditText">browse</span></p>
                            </div>
                            <img id="previewImage-{{ $reviewers->id }}" class="hidden" alt="Image Preview">
                        </div>

                        <div class="mb-3">
                            <label for="revname-{{ $reviewers->id }}">Reviewer Name</label>
                            <input class="form-control" name="reviewer_name" type="text" value="{{ $reviewers->reviewer_name }}" id="revname-{{ $reviewers->id }}" placeholder="Enter reviewer's name">
                        </div>

                        <div class="mb-3">
                            <label for="aboutme-{{ $reviewers->id }}">About Me</label>
                            <textarea rows="6" name="bio" id="aboutme-{{ $reviewers->id }}" class="form-control" placeholder="">{{ $reviewers->bio }}</textarea>
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
@endforeach

                    </div>
                </div> <!-- container-fluid -->
            </div>

<script>
    document.getElementById('browseText').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});
</script>
            
@endsection