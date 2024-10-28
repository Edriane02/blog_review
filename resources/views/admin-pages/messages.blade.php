@extends('layouts.sidebar')
@section('title', 'Messages')

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
                        <h1 class="page-title-custom">Messages</h1>
                        <p>This page shows messages submitted through the website's <b>contact form</b>.</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="float-end d-sm-block">
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
                                            <th>Date & Time</th>
                                            <th>Name & Email</th>
                                            <th>Phone number</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($messages->count() > 0)
                                            @foreach($messages as $message)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{!! $message->created_at->format('M d, Y') . '<br>' . $message->created_at->format('h:i A') !!}</td>
                                                    <td><strong>{{ $message->full_name }}</strong><br /><span style="font-size: 12px;">{{ $message->email }}</span></td>
                                                    <td>{{ $message->phone_number }}</td>
                                                    <td>{{ Str::limit($message->message, 50) }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <!-- Edit Button -->
                                                            <button type="button"
                                                                class="btn btn-primary btn-sm waves-effect waves-light"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#viewMessageModal-{{ $message->id }}">
                                                                <i class="bi bi-eye"></i>
                                                            </button>&nbsp;

                                                            <!-- Delete Button -->
                                                            <form id="delete-form-{{ $message->id }}"
                                                                action="{{ route('deleteMessage', $message->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-sm btn-danger"
                                                                    onclick="confirmDelete({{ $message->id }})">
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
                                                        No messages found.
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

            @foreach ($messages as $message)
                <!-- View Message Modal -->
                <div class="modal fade" data-bs-backdrop="static" id="viewMessageModal-{{ $message->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="viewMessageModalLabel-{{ $message->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <!-- Message start -->
                                    <div class="card-header">
                                        <h5 class="mb-0"><i class="bi bi-envelope-paper"></i>&nbsp;&nbsp;Message Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <h6 class="font-weight-bold">Date & Time:</h6>
                                            <p class="text-muted">{{ $message->created_at->format('M d, Y, h:i A') }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <h6 class="font-weight-bold">Name:</h6>
                                            <p class="text-muted">{{ e($message->full_name) }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <h6 class="font-weight-bold">Email:</h6>
                                            <p class="text-muted d-inline">
                                                {{ e($message->email) }}
                                                <button style="padding: 0.19rem 0.3rem; font-size: 0.62rem;" class="btn btn-secondary btn-sm" onclick="copyEmail('{{ e($message->email) }}', this)"><i class="bi bi-copy"></i> Copy</button>
                                            </p>
                                        </div>

                                        <div class="mb-3">
                                            <h6 class="font-weight-bold">Phone Number:</h6>
                                            <p class="text-muted">{{ e($message->phone_number) }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <h6 class="font-weight-bold">Message:</h6>
                                            <p class="text-muted">{!! nl2br(e($message->message)) !!}</p>
                                        </div>
                                    </div>
                                <!-- Message end -->
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            @endforeach

        </div>
    </div> <!-- container-fluid -->
</div>

<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            "order": [[0, "desc"]] // Sort by the first column (Date) in descending order
        });
    });

    // Copy email address
    function copyEmail(email, button) {
        navigator.clipboard.writeText(email).then(function() {
            button.innerHTML = '<i class="bi bi-check-lg"></i> Copied!';
            setTimeout(() => {
                button.innerHTML = '<i class="bi bi-copy"></i> Copy';
            }, 2000);
        }, function(err) {
            console.error('Could not copy email: ', err);
        });
    }

    // SweetAlert delete dialog
    function confirmDelete(messageId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This will delete the contact information and message, and you won't be able to undo this action.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form
                document.getElementById('delete-form-' + messageId).submit();
            }
        });
    }

</script>

@endsection