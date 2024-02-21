@extends('frontend.layout.master')

@section('content_title')
    <h1 class="primary-text">MM Student Portal</h1>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-lg-10 mb-2 offset-lg-1 d-flex justify-content-end">
            <a class="mb-0 text-underline text-muted cursor-pointer">
                Add Fixed Data
            </a>
        </div>
        <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-10 offset-lg-1 student-form-container">
                <div class="d-flex flex-column position-relative justify-content-center align-items-center">
                    <p>Occupation - <span class="text-underline">Student</span></p>
                    <div class="col-lg-4 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex position-relative justify-content-center align-items-center border-0 rounded-5 upload-university cursor-pointer"
                            id="uploadButton" style="background-size:cover; background-position: center;">
                            <p class="fw-bold p-3 mb-0 text-center" id="upload-text">Upload <br /> Student Photo</p>
                            <input name="image" id="fileInput" type="file" class="position-absolute"
                                style="visibility: hidden;">
                        </div>
                        @error('image')
                            <span role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="position-absolute start-0 top-0 university-container">
                        <p class="mb-0 fs-4 text-dark">M.S.T University</p>
                        <p class="mb-0 fs-5 text-muted">Student Year - *2023 - 2024*</p>
                    </div>
                    <div class="qr-container d-flex flex-column align-items-end position-absolute end-0 top-0">
                        <img src="{{ asset('asset/img/220px-Qr-1.svg.png') }}" class="icon-2 qr-code">
                        <a class="mb-0 text-muted text-underline mt-1 cursor-pointer">Generate QR</a>
                        <a class="mb-0 text-muted text-underline mt-1 cursor-pointer">Generate Document</a>
                    </div>
                </div>
                <div>
                    <p class="mb-0">Name</p>
                    <input class="custom-form-control-1 w-100" name="name" type="text">
                </div>
                @error('name')
                    <span role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mt-3">
                    <p class="mb-0">Student ID</p>
                    <input class="custom-form-control-1 w-100" name="student_no" type="text">
                </div>
                @error('student_no')
                    <span role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
                <div class="row d-flex mt-3">
                    <div class="col-md-6">
                        <p class="mb-0">NRC Number</p>
                        <input class="custom-form-control-1 w-100" name="nrc" type="text">
                        @error('nrc')
                            <span role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <p class="mb-0">Date Of Birth</p>
                        <input class="custom-form-control-1 w-100" name="date" type="date">
                        @error('date')
                            <span role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="mt-3">
                    <p class="mb-0">Batch No.</p>
                    <input class="custom-form-control-1 w-100" name="batch" type="text">
                </div>
                @error('batch')
                    <span role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mt-3">
                    <p class="mb-0">Level of Education</p>
                    <input class="custom-form-control-1 w-100" name="education" type="text">
                </div>
                @error('education')
                    <span role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
                <div class="row d-flex mt-3">
                    <div class="col-md-6">
                        <p class="mb-0">Email Address</p>
                        <input class="custom-form-control-1 w-100" name="email" type="text">
                        @error('email')
                            <span role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <p class="mb-0">Phone Number</p>
                        <input class="custom-form-control-1 w-100" name="phone" type="number">
                        @error('phone')
                            <span role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="mt-3">
                    <p class="mb-0">Address</p>
                    <input class="custom-form-control-1 w-100" name="address" type="text">
                </div>
                @error('address')
                    <span role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-lg-10 mb-2 offset-lg-1 d-flex justify-content-around align-items-center col-gap-2 mt-3">

                <button type="submit" class="custom-btn-primary border-0 rounded-pill text-dark fs-5 px-5">Done</button>
            </div>
        </form>
    </div>
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
