@extends('frontend.layout.master')

@section('content_title')
    <h1 class="primary-text">Student Information</h1>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-lg-10 mb-2 offset-lg-1 d-flex justify-content-end">
            <a class="mb-0 text-underline text-muted cursor-pointer">
                Add Fixed Data
            </a>
        </div>
        
            <div class="col-lg-10 offset-lg-1 student-form-container">
                <div class="d-flex flex-column position-relative justify-content-center align-items-center">
                    <p>Occupation - <span class="text-underline">Student</span></p>
                    <div class="col-lg-4 d-flex flex-column align-items-center justify-content-center">
                        
                            <img src="{{ asset('storage/students/' . $student->image) }}" alt="student-photo" class="img-thumbnail" width="200" height="200">
                        
                    </div>
                    <div class="position-absolute start-0 top-0 university-container">
                        <p class="mb-0 fs-4 text-dark">M.S.T University</p>
                        <p class="mb-0 fs-5 text-muted">Student Year - *2023 - 2024*</p>
                    </div>
                </div>
                <div>
                    <p class="mb-0">Name</p>
                    <input class="custom-form-control-1 w-100" name="name" type="text" value="{{$student->name}}" disabled>
                </div>
                
                <div class="mt-3">
                    <p class="mb-0">Student ID</p>
                    <input class="custom-form-control-1 w-100" name="student_no" type="text" value="{{$student->student_no}}" disabled>
                </div>
                
                <div class="row d-flex mt-3">
                    <div class="col-md-6">
                        <p class="mb-0">NRC Number</p>
                        <input class="custom-form-control-1 w-100" name="nrc" type="text" value="{{$student->nrc}}" disabled>
                        
                    </div>

                    <div class="col-md-6">
                        <p class="mb-0">Date Of Birth</p>
                        <input class="custom-form-control-1 w-100" name="date" type="date" value="{{$student->date}}" disabled>
                       
                    </div>

                </div>
                <div class="mt-3">
                    <p class="mb-0">Batch No.</p>
                    <input class="custom-form-control-1 w-100" name="batch" type="text" value="{{$student->batch}}" disabled>
                </div>
                
                <div class="mt-3">
                    <p class="mb-0">Level of Education</p>
                    <input class="custom-form-control-1 w-100" name="education" type="text" value="{{$student->education}}" disabled>
                </div>

                <div class="row d-flex mt-3">
                    <div class="col-md-6">
                        <p class="mb-0">Email Address</p>
                        <input class="custom-form-control-1 w-100" name="email" type="text" value="{{$student->email}}" disabled>
                        
                    </div>

                    <div class="col-md-6">
                        <p class="mb-0">Phone Number</p>
                        <input class="custom-form-control-1 w-100" name="phone" type="number" value="{{$student->phone}}" disabled>
                        
                    </div>

                </div>
                <div class="mt-3">
                    <p class="mb-0">Address</p>
                    <input class="custom-form-control-1 w-100" name="address" type="text" value="{{$student->address}}" disabled>
                </div>
                
            </div>
            
        
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
