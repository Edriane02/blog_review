@extends('layouts.sidebar')
@section('title', 'All Posts')

@section('contents')

<div class="page-content">

<<<<<<< HEAD
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
=======
               <!-- start page title -->
               <div class="page-title-box">
>>>>>>> CFranlin
                    <div class="container-fluid">
                     <div class="row align-items-center">
                         <div class="col-sm-6">
                             <div class="page-title">
<<<<<<< HEAD
                                <h2 class="page-title-custom">All Posts | Content Management System</h2>
=======
                                 <h1 class="page-title-custom">All Posts</h1>
>>>>>>> CFranlin
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
<<<<<<< HEAD
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
            @if($posts->count() > 0)
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->created_at->format('M d, Y') }}</td>
                        <td><strong>{{ optional($post->book)->title ?? 'Unknown Title' }}</strong></td>
                        <td>
                        
                                    @php
                                        $reviewer = $post->reviewer; // This is an integer (reviewer ID)
                                        // Fetch the actual reviewer object
                                        $actualReviewer = \App\Models\Reviewer::find($reviewer);
                                    @endphp
                                    {{ optional($actualReviewer)->reviewer_name ?? 'Unknown Reviewer' }}
                                
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="edit-post.html" type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                                    <i class="bi bi-pencil-square"></i>
                                </a>&nbsp;

                                <!-- Delete Button -->
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

=======
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
>>>>>>> CFranlin
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>

                        

<<<<<<< HEAD
                        
                    </div>
                </div> <!-- container-fluid -->
            </div>

<!-- Delete SweetAlert Dialog start -->
<script>
    function confirmDelete(postId) {
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
                document.getElementById('delete-form-' + postId).submit();
            }
        });
    }
</script>
<!-- Delete SweetAlert Dialog end -->
=======
        
>>>>>>> CFranlin
            
@endsection