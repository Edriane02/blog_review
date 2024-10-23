@extends('layouts.sidebar')
@section('title', 'Reviewers')

@section('contents')

<div class="page-content">

    <!-- SweetAlert Dialogs start -->
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops... Something went wrong!',
                html: '{!! implode("", $errors->all("<li>:message</li>")) !!}', // This compiles the error messages into list items
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
    <!-- SweetAlert Dialogs end -->

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
                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target=".addReviewerModal">Add New Reviewer</button>
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
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                                                        <img class="rounded-circle reviewer-profile"
                                                            src="{{ asset('storage/' . ($reviewers->photo ?? 'static/default_photo.jpg')) }}"
                                                            alt="Reviewer's photo">
                                                    </td>
                                                    <td>
                                                        <strong>{{ $reviewers->reviewer_name }}</strong>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <!-- Edit Button -->
                                                            <button type="button"
                                                                class="btn btn-primary btn-sm waves-effect waves-light"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editReviewerModal-{{ $reviewers->id }}">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </button>&nbsp;

                                                            <!-- Delete Button -->
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
                                                <td colspan="3" class="text-center">
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
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>

            <!-- Add New Reviewer Modal -->
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
                                <!-- Form Start -->
                                <p><strong>Upload Reviewer's Photo</strong></p>
                                <div class="upload-container mb-3" id="uploadContainer">
                                    <input class="form-control" type="file" name="photo" id="fileInput" accept="image/*">

                                </div>

                                <div class="mb-3">
                                    <label for="revname">Reviewer Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="reviewer_name" type="text"
                                        placeholder="Enter name..." id="revname" required>
                                </div>

                                <div class="mb-3">
                                    <label for="aboutme">About Me</label>
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
                        <!-- Form End -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- End of Add New Reviewer Modal -->

            @foreach ($reviewer as $reviewers)
                <!-- Edit Reviewer Modal -->
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
                                    <!-- Form Start -->
                                    <p><strong>Upload Reviewer's Photo</strong></p>
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
                                        <label for="aboutme-{{ $reviewers->id }}">About Me</label>
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
    document.getElementById('browseText').addEventListener('click', function () {
        document.getElementById('fileInput').click();
    });
</script>

<!-- Delete SweetAlert Dialog start -->
<script>
    function confirmDelete(reviewerId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form
                document.getElementById('delete-form-' + reviewerId).submit();
            }
        });
    }
</script>
<!-- Delete SweetAlert Dialog end -->

@endsection