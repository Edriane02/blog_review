@extends('layouts.sidebar')
@section('title', 'All Posts')

@section('contents')

<div class="page-content">
@include('partials.sweetalert')

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="container-fluid">
                     <div class="row align-items-center">
                         <div class="col-sm-6">
                             <div class="page-title">
                                <h1 class="page-title-custom">All Posts</h1>
                             </div>
                         </div>

                         <div class="col-sm-6">
                            <div class="float-end d-sm-block">
                                <a href="{{ route('newPost') }}" type="button" class="btn btn-success waves-effect waves-light">Add New Post</a>
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
                                                    <th>#</th>
                                                    <th>Date Posted</th>
                                                    <th>Book Title</th>
                                                    <th>Reviewed by</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @if($posts->count() > 0)
                                                        @foreach($posts as $post)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td class="align-middle">{{ $post->created_at->format('M d, Y') }}</td>
                                                                <td class="align-middle">
                                                                    <strong>{{ optional($post->book)->title ?? 'Unknown Title' }}</strong><br />
                                                                    <span class="text-muted" style="font-size: 12px;">Authored by {{ optional($post->book)->book_author ?? 'Unknown Author' }}</span>
                                                                </td>
                                                                <td class="align-middle">
                                                                    @php
                                                                        $reviewer = $post->reviewer; // This is an integer (reviewer ID)
                                                                        // Fetch the actual reviewer object
                                                                        $actualReviewer = \App\Models\Reviewer::find($reviewer);
                                                                    @endphp
                                                                    {{ optional($actualReviewer)->reviewer_name ?? 'Unknown Reviewer' }}
                                                                </td>
                                                                <td class="align-middle">
                                                                    <div class="d-flex">
                                                                        <!-- Edit button -->
                                                                        <a href="{{ route('editPost', $post->book_id) }}" type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                                                                            <i class="bi bi-pencil-square"></i>
                                                                        </a>&nbsp;
                                                                        <!-- Delete button -->
                                                                        <form id="delete-form-{{ $post->id }}"
                                                                            action="{{ route('deletePost', $post->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                                onclick="confirmDelete({{ $post->id }})">
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
                                                                    No posts found.
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
                    </div>
                </div> <!-- container-fluid -->
            </div>

@include('partials.swal-confirm-delete')
            
@endsection