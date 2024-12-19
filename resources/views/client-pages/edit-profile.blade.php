@extends('layouts.app')
@section('title', 'Edit Profile')

@section('contents')

<main class="bg-grey pt-80 pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap widget-taber-content p-30 bg-white border-radius-10">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1 text-center">
                                <h3 class="mb-30 font-weight-900">Edit Profile</h3>
                            </div>
                            <form method="POST" action="{{ route('clientUpdateProfile') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="first_name"><strong>First Name <span class="text-danger">*</span></strong></label>
                                    <input type="text" id="first_name" class="form-control" value="{{ old('fname', $clientProfile->fname) }}" name="fname" placeholder="First Name *" required>
                                </div>
                                <div class="form-group">
                                    <label for="middle_name"><strong>Middle Name</strong></label>
                                    <input type="text" id="middle_name" class="form-control" value="{{ old('mname', $clientProfile->mname) }}" name="mname" placeholder="Middle Name">
                                </div>
                                <div class="form-group">
                                    <label for="last_name"><strong>Last Name <span class="text-danger">*</span></strong></label>
                                    <input type="text" id="last_name" class="form-control" value="{{ old('lname', $clientProfile->lname) }}" name="lname" placeholder="Last Name *" required>
                                </div>
                                <div class="form-group">
                                    <label for="suffix"><strong>Suffix</strong></label>
                                    <input type="text" id="suffix" class="form-control" value="{{ old('suffix', $clientProfile->suffix) }}" name="suffix" placeholder="Suffix">
                                </div>
                                <div class="form-group">
                                    <label for="email"><strong>Email <span class="text-danger">*</span></strong></label>
                                    <input type="email" id="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" name="email" placeholder="Email *" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn-block mb-4" id="registerButton">Save Changes</button>
                                </div>
                            </form>

                            <div class="text-muted text-center mb-3">Want to change your password? <a style="color: #5869da!important;" href="{{ route('clientChangePassword') }}">Click here</a>.</div>
                            <div class="text-muted text-center"><a style="color: #5869da!important;" href="{{ route('clientProfile') }}">← Go back</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br /><br /><br /><br />
    </main>
    

@endsection