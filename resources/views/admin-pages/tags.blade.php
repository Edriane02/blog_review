@extends('layouts.sidebar')
@section('title', 'Manage Tags')

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
                        <h1 class="page-title-custom">Manage Tags</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="float-end d-sm-block">
                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target=".addTagModal">Add New Tag</button>
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
                                            <th>#</th>
                                            <th>Tag Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($tags->count() > 0)
                                            @foreach($tags as $tag)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="tag-title">{{ $tag->tag }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <!-- Edit Button -->
                                                            <!-- Disable the edit button if tag is "Featured Review" -->
                                                            <button type="button"
                                                                class="btn btn-primary btn-sm waves-effect waves-light"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editTagModal-{{ $tag->id }}"
                                                                @if($tag->tag === 'Featured Review') disabled @endif>
                                                                <i class="bi bi-pencil-square"></i>
                                                            </button>&nbsp;

                                                            <!-- Delete Button -->
                                                            <form id="delete-form-{{ $tag->id }}"
                                                                action="{{ route('deleteTag', $tag->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <!-- Disable the delete button if tag is "Featured Review" -->
                                                                <button type="button" class="btn btn-sm btn-danger"
                                                                    @if($tag->tag === 'Featured Review') disabled @else
                                                                    onclick="confirmDelete({{ $tag->id }})" @endif>
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

            <!-- Add New Tag Modal -->
            <div class="modal fade addTagModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="addTagModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="addTagModalLabel">Add New Tag</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form method="POST" action="{{ route('addTag') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <!-- Required field indicator -->
                                <p style="font-size: 12px;" class="mb-2"><span class="text-danger">*</span> Indicates required field.</p>

                                <!-- Form Start -->
                                <div class="mb-3">
                                    <label for="dname">Tag Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="tag" type="text" placeholder="Enter tag name..."
                                        id="dname" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Add Tag</button>
                            </div>
                        </form>
                        <!-- Form End -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- End of Add New Tag Modal -->

            @foreach ($tags as $tag)
                <!-- Edit Tag Modal -->
                <div class="modal fade" data-bs-backdrop="static" id="editTagModal-{{ $tag->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="editTagModalLabel-{{ $tag->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="editTagModalLabel">Edit Tag</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('editTag') }}">
                                @csrf
                                <div class="modal-body">
                                <!-- Required field indicator -->
                                <p style="font-size: 12px;" class="mb-2"><span class="text-danger">*</span> Indicates required field.</p>

                                    <!-- Hidden ID -->
                                    <input type="hidden" name="id" value="{{ $tag->id }}">
                                    <!-- Form Start -->
                                    <div class="mb-3">
                                        <label for="dname">Tag Name <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control" name="tag" type="text" value="{{ $tag->tag }}"
                                            id="dname" required>
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
                <!-- End of Edit Tag Modal -->
            @endforeach

        </div>
    </div> <!-- container-fluid -->
</div>

<!-- Delete SweetAlert Dialog start -->
<script>
    function confirmDelete(tagId) {
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
                document.getElementById('delete-form-' + tagId).submit();
            }
        });
    }
</script>
<!-- Delete SweetAlert Dialog end -->

@endsection