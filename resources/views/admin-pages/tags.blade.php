@extends('layouts.sidebar')
@section('title', 'Manage Tags')

@section('contents')

<div class="page-content">
@include('partials.sweetalert')

    <!-- Page title start -->
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
                                                            <!-- Edit button -->
                                                            <!-- Disable the edit button if tag is "Featured Review" -->
                                                            <button type="button"
                                                                class="btn btn-primary btn-sm waves-effect waves-light"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editTagModal-{{ $tag->id }}"
                                                                @if($tag->tag === 'Featured Review') disabled @endif>
                                                                <i class="bi bi-pencil-square"></i>
                                                            </button>&nbsp;

                                                            <!-- Delete button -->
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
                    </div> <!-- /.col-12 -->
                </div> <!-- /.row -->
            </div>

            <!-- Add new tag modal -->
            <div class="modal fade addTagModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="addTagModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="addTagModalLabel">Add New Tag</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Form start -->
                        <form method="POST" action="{{ route('addTag') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <!-- Required field indicator -->
                                <p style="font-size: 12px;" class="mb-2"><span class="text-danger">*</span> Indicates required field.</p>

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
                        <!-- Form end -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- Add new tag modal end -->

            @foreach ($tags as $tag)
                <!-- Edit tag modal start -->
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
                                    <!-- Form start -->
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
                            <!-- Form end -->
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!-- Edit tag modal end -->
            @endforeach

        </div>
    </div> <!-- /.container-fluid -->
</div>

@include('partials.swal-confirm-delete')

@endsection