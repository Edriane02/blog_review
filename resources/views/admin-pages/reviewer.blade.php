@extends('layouts.sidebar')
@section('title', 'Reviewers')

@section('contents')

<div class="page-content">
@include('partials.sweetalert')

    <!-- Page title start -->
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
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target=".addReviewerModal">Add New Reviewer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page title end -->

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row justify-content-center">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($reviewer->count() > 0)
                                            @foreach($reviewer as $reviewers)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <img class="rounded-circle reviewer-profile"
                                                            src="{{ asset('storage/' . ($reviewers->photo ?? 'static/default_photo.jpg')) }}"
                                                            alt="Reviewer's photo">
                                                    </td>
                                                    <td>
                                                        <strong>{{ $reviewers->reviewer_name }}</strong>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <!-- Edit button -->
                                                            <button type="button"
                                                                class="btn btn-primary btn-sm waves-effect waves-light"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editReviewerModal-{{ $reviewers->id }}">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </button>&nbsp;

                                                            <!-- Delete button -->
                                                            <form id="delete-form-{{ $reviewers->id }}"
                                                                action="{{ route('deleteReviewer', $reviewers->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-sm btn-danger"
                                                                    onclick="confirmDelete({{ $reviewers->id }})">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    <div class="alert alert-info" role="alert">
                                                        No reviewers found.
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- /.col-12 -->
                </div> <!-- /.row -->
            </div>

            <!-- Add new reviewer modal -->
            <div class="modal fade addReviewerModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="addReviewerModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="addReviewerModalLabel">Add New Reviewer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form method="POST" action="{{ route('addReviewer') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <!-- Required field indicator -->
                                <p style="font-size: 12px;" class="mb-2"><span class="text-danger">*</span> Indicates required field.</p>

                                <!-- Form start -->
                                <p><strong>Upload Reviewer's Photo (optional)</strong></p>
                                <div class="upload-container mb-3" id="uploadContainer">
                                    <input class="form-control" type="file" name="photo" id="fileInput" accept="image/*">
                                </div>

                                <div class="mb-3">
                                    <label for="revname">Reviewer Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="reviewer_name" type="text"
                                        placeholder="Enter name..." id="revname" required>
                                </div>

                                <div class="mb-3">
                                    <label for="aboutme">About</label>
                                    <textarea rows="6" name="bio" id="aboutme" class="form-control"
                                        placeholder="Enter bio here..."></textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Add
                                    Reviewer</button>
                            </div>
                        </form>
                        <!-- Form end -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- Add new reviewer modal end -->

            @foreach ($reviewer as $reviewers)
                <!-- Edit reviewer modal start -->
                <div class="modal fade" data-bs-backdrop="static" id="editReviewerModal-{{ $reviewers->id }}" tabindex="-1"
                    aria-labelledby="editReviewerLabel-{{ $reviewers->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="editReviewerModalLabel-{{ $reviewers->id }}">Edit
                                    Reviewer's Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('editReviewer') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <!-- Required field indicator -->
                                    <p style="font-size: 12px;" class="mb-2"><span class="text-danger">*</span> Indicates required field.</p>

                                    <!-- Hidden ID -->
                                    <input type="hidden" name="id" value="{{ $reviewers->id }}">

                                    <!-- Form start -->
                                    <p><strong>Upload Reviewer's Photo (optional)</strong></p>
                                    <center>
                                        <img class="rounded-circle mb-3" src="{{ asset('storage/' . ($reviewers->photo ?? 'static/default_photo.jpg')) }}"
                                            width="200" alt="Reviewer's photo">
                                    </center>
                                    <div class="upload-container mb-3" id="uploadContainer">
                                        <input class="form-control" type="file" name="photo" id="fileInput"
                                            accept="image/*">
                                    </div>

                                    <div class="mb-3">
                                        <label for="revname-{{ $reviewers->id }}">Reviewer Name <span class="text-danger">*</span></label>
                                        <input class="form-control" name="reviewer_name" type="text"
                                            value="{{ $reviewers->reviewer_name }}" id="revname-{{ $reviewers->id }}"
                                            placeholder="Enter name..." required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="aboutme-{{ $reviewers->id }}">About</label>
                                        <textarea rows="6" name="bio" id="aboutme-{{ $reviewers->id }}" class="form-control"
                                            placeholder="Enter bio here...">{{ $reviewers->bio }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                        changes</button>
                                </div>
                            </form>
                            <!-- Form end -->
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!-- Edit reviewer modal end -->
            @endforeach

        </div>
    </div> <!-- /.container-fluid -->
</div>

<script>
    document.getElementById('browseText').addEventListener('click', function () {
        document.getElementById('fileInput').click();
    });
</script>

@include('partials.swal-confirm-delete')

@endsection