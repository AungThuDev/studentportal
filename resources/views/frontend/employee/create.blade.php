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
        <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-10 offset-lg-1 student-form-container">
                <div class="d-flex flex-column position-relative justify-content-center align-items-center">
                    <p>Occupation - <span class="text-underline">Executive Manager</span></p>
                    <img class="icon-3 mt-4 cursor-pointer" src="{{ asset('asset/img/student.png') }}" id="uploadButton">
                    <input name="image" id="fileInput" type="file" class="position-absolute"
                        style="visibility: hidden;">
                    @error('image')
                        <span role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="position-absolute start-0 top-0 university-container">
                        <p class="mb-0 fs-4 text-dark">M.S.T University</p>
                        <p class="mb-0 fs-5 text-muted">Employment Year - *2023 - 2024*</p>
                    </div>
                    <div class="qr-container d-flex flex-column align-items-end position-absolute end-0 top-0">
                        <img src="{{ asset('asset/img/220px-Qr-1.svg.png') }}" class="icon-2 qr-code">
                        <a class="mb-0 text-muted text-underline mt-1 cursor-pointer">Generate QR</a>
                        <a class="mb-0 text-muted text-underline mt-1 cursor-pointer">Generate Document</a>
                    </div>
                </div>
                <div>
                    <p class="mb-0">Name</p>
                    <input class="custom-form-control-1 w-100" type="text" name="name">
                </div>
                @error('name')
                    <span role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mt-3">
                    <p class="mb-0">Employee ID</p>
                    <input class="custom-form-control-1 w-100" type="text" name="emp_no">
                </div>
                @error('emp_no')
                    <span role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
                <div class="row d-flex mt-3">
                    <div class="col-md-6">
                        <p class="mb-0">NRC Number</p>
                        <input class="custom-form-control-1 w-100" type="text" name="nrc">
                        @error('nrc')
                            <span role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <p class="mb-0">Date Of Birth</p>
                        <input class="custom-form-control-1 w-100" type="date" name="date">
                        @error('date')
                            <span role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mt-3">
                    <p class="mb-0">Position</p>
                    <input class="custom-form-control-1 w-100" type="text" name="position">
                </div>
                @error('position')
                    <span role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mt-3">
                    <p class="mb-0">Department</p>
                    <input class="custom-form-control-1 w-100" type="text" name="department">
                </div>
                @error('department')
                    <span role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
                <div class="row d-flex mt-3">
                    <div class="col-md-6">
                        <p class="mb-0">Email Address</p>
                        <input class="custom-form-control-1 w-100" type="email" name="email">
                        @error('email')
                            <span role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <p class="mb-0">Phone Number</p>
                        <input class="custom-form-control-1 w-100" type="phone" name="phone">
                        @error('phone')
                            <span role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mt-3">
                    <p class="mb-0">Address</p>
                    <input class="custom-form-control-1 w-100" type="text" name="address">
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
            document.getElementById('uploadButton').src = url;
        });
    </script>
@endsection
