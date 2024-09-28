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
                                <h2 class="page-title-custom">All Posts | Content Management System</h2>
                                <p class="page-title-custom">Dashboard</p> 
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

                                                <tr>
                                                    <td>Sep 6, 2024</td>
                                                    <td><strong>The Attenuating Puritan</strong></td>
                                                    <td>Faustine Sinclair</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="edit-post.html" type="button" class="btn btn-primary btn-sm waves-effect waves-light"><i class="bi bi-pencil-square"></i></a>&nbsp;
                                                            <button class="btn btn-sm btn-danger" onclick="if(confirm('Are you sure you want to delete this post?')) { /* Add delete action here */ }"><i class="bi bi-trash"></i></button>
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

                        <!-- Add New Tag Modal -->
                        <div class="modal fade addTagModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addTagModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0" id="addTagModalLabel">Add New Tag</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <!-- Form Start -->
                                        <form action="#" method="post">
                                            <div class="mb-3">
                                                <label for="dname">Tag Name</label>
                                                <input class="form-control" type="text" placeholder="Enter tag name..." id="dname">
                                            </div>
                                    </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary waves-effect waves-light">Add Tag</button>
                                            </div>
                                        </form>
                                        <!-- Form End -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- End of Add New Tag Modal -->

                        <!-- Edit Tag Modal -->
                        <div class="modal fade editTagModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editTagModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0" id="editTagModalLabel">Edit Tag</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Start -->
                                        <form action="#" method="post">           
                                            <div class="mb-3">
                                                <label for="dname">Tag Name</label>
                                                <input class="form-control" type="text" value="Biography" placeholder="Enter tag name..." id="dname">
                                            </div>
                                    </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                            </div>
                                        </form>
                                        <!-- Form End -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- End of Edit Tag Modal -->
                    </div>
                </div> <!-- container-fluid -->
            </div>
            
@endsection