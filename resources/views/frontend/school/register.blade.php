@extends('frontend.layout.master')

@section('content_title')
    <h1 class="text-muted">Register Your University</h1>
@endsection

@section('content')
    <form action="{{ route('school.store') }}" method="POST" class="row mt-4 d-flex" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-7">
            <div class="row">
                <div class="col-lg-4 d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex position-relative justify-content-center align-items-center border-0 rounded-5 upload-university cursor-pointer"
                        id="uploadButton" style="background-size:cover; background-position: center;">
                        <p class="fw-bold p-3 mb-0 text-center" id="upload-text">Upload <br /> University Logo</p>
                        <input name="image" id="fileInput" type="file" class="position-absolute"
                            style="visibility: hidden;">
                    </div>
                    @error('image')
                        <span role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-8 d-flex flex-column">
                    <div class="d-flex flex-column">
                        <label for="name">Name <span style="color: red;">*</span></label>
                        <input name="name" value="{{ old('name') }}" id="name" class="custom-form-control-1"
                            type="text">
                        @error('name')
                            <span role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex flex-column mt-3">
                        <label for="founded_year">Founded Year <span style="color: red;">*</span></label>
                        <input name="founded_year" value="{{ old('founded_year') }}" id="founded_year"
                            class="custom-form-control-1" type="text">
                        @error('founded_year')
                            <span role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 d-flex flex-column mt-3">
                    <label for="authority_name">Registration Authority Name <span style="color: red;">*</span></label>
                    <input name="authority_name" value="{{ old('authority_name') }}" id="authority_name"
                        class="custom-form-control-1" type="text">
                    @error('authority_name')
                        <span role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 d-flex flex-column mt-3">
                    <label for="position">Registrtion Authority Role <span style="color: red;">*</span></label>
                    <input name="position" value="{{ old('position') }}" id="authority_role" class="custom-form-control-1"
                        type="text">
                    @error('position')
                        <span role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 d-flex flex-column mt-3">
                    <label for="email">Email <span style="color: red;">*</span></label>
                    <input name="email" value="{{ old('email') }}" id="email" class="custom-form-control-1"
                        type="text">
                    @error('email')
                        <span role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 d-flex flex-column mt-3">
                    <label for="password">Password <span style="color: red;">*</span></label>
                    <input name="password" id="passowrd" class="custom-form-control-1" type="password">
                    @error('password')
                        <span role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 d-flex flex-column mt-3">
                    <label for="student_amount">Student Amount <span style="color: red;">*</span></label>
                    <input name="student_amount" value="{{ old('student_amount') }}" id="student_amount"
                        class="custom-form-control-1" type="text">
                    @error('student_amount')
                        <span role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 d-flex flex-column mt-3">
                    <label for="document">Requirement Type <span style="color: red;">*</span></label>
                    <input name="document" id="requirement_type " class="custom-form-control-1" type="file">
                    @error('document')
                        <span role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-lg-5 d-flex position-relative justify-content-center register">
            <div
                class="d-flex position-absolute start-0 end-0 bottom-0 col-gap-2 align-items-center justify-content-center">
                <a class="primary-text fw-bold text-underline">Cancel</a>
                <button class="btn custom-btn-secondary fw-bold border-0 rounded-pill" type="submit">Register</button>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        document.getElementById('uploadButton').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });
        document.getElementById('fileInput').addEventListener('change', function() {
            let fileInput = document.getElementById('fileInput');
            let file = fileInput.files[0];
            let url = URL.createObjectURL(file);
            document.getElementById('uploadButton').style.backgroundImage = "url('" + url + "')";
            document.getElementById('upload-text').style.display = "none";
        });
    </script>
@endsection
