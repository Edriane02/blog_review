@extends('layouts.sidebar')
@section('title', 'Featured Author')

@section('contents')

<div class="page-content">
@include('partials.sweetalert')

                <!-- Page title start -->
                <div class="page-title-box">
                    <div class="container-fluid">
                     <div class="row align-items-center">
                         <div class="col-sm-6">
                             <div class="page-title">
                                <h1 class="page-title-custom">Featured Author</h1>
                             </div>
                         </div>

                         <div class="col-sm-6">
                            <div class="float-end d-sm-block">
                                <a href="{{ route('featured_authors.create') }}" type="button" class="btn btn-success waves-effect waves-light">Add Featured Author</a>
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
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date Posted</th>
                                                    <th>Author's Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @if($authors->count() > 0)
                                                        @foreach ($authors as $author)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td class="align-middle">{{ $author->created_at->format('M d, Y') }}</td>
                                                                <td class="align-middle">
                                                                    <strong>{{ $author->author_name }}</strong>
                                                                </td>
                                                                <td class="align-middle">
                                                                {{ $author->status }}
                                                                </td>
                                                                <td class="align-middle">
                                                                    <div class="d-flex">
                                                                        <!-- Edit button -->
                                                                        <a href="{{ route('featured_authors.edit', $author->id) }}" type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                                                                            <i class="bi bi-pencil-square"></i>
                                                                        </a>&nbsp;
                                                                        <!-- Delete button -->
                                                                        <form id="delete-form-{{ $author->id }}"
                                                                            action="{{ route('featured_authors.destroy', $author->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                                onclick="confirmDelete({{ $author->id }})">
                                                                                <i class="bi bi-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="5" class="text-center">
                                                                <div class="alert alert-info" role="alert">
                                                                    No authors found.
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
                    </div>
                </div> <!-- /.container-fluid -->
            </div>

@include('partials.swal-confirm-delete')
            
@endsection