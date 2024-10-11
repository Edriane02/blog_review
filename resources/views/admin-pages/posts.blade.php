@extends('layouts.sidebar')
@section('title', 'All Posts')

@section('contents')

<div class="page-content">

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
                                <a href="add-post.html" type="button" class="btn btn-success waves-effect waves-light">Add New Post</a>
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
                                                    <th>Date Posted</th>
                                                    <th>Title</th>
                                                    <th>Reviewed by</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @if($books->count() > 0)
                                                                @foreach($books as $book)
                                                    <tr>
                                                        <td class="post-date">{{ $book->created_at->format('F j, Y') }}</td>
                                                        <td class="post-title"><strong>{{ $book->title }}</strong></td>
                                                        @foreach($book->reviews as $review)
                                                        <td class="post-reviewer">{{ $review->reviewer }}</td>
                                                        @endforeach 
                                                        <td>
                                                                <div class="d-flex">
                                                                    <a href="{{ route('editPost') }}" type="button" class="btn btn-primary btn-sm waves-effect waves-light"><i class="bi bi-pencil-square"></i></a>&nbsp;
                                                                    <button class="btn btn-sm btn-danger" onclick="if(confirm('Are you sure you want to delete this post?')) { /* Add delete action here */ }"><i class="bi bi-trash"></i></button>
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

                        

        
            
@endsection