@extends('frontend.layout.master')

@section('content_title')
    <h1 class="primary-text">MM Student Portal</h1>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-lg-10 offset-lg-1 authority-form-container">
            <div class="row d-flex">
                <div class="col-12 d-flex justify-content-center text-underline mb-3">Student's Card Design</div>
                <div class="col-md-3 d-flex justify-content-center">

                </div>

            </div>
            <div class="row d-flex justify-content-start flex-wrap col-gap-2 card-container mt-5">



                <div class="col-lg-4 d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center custom-card">
                        <div class="col-md-3 d-flex justify-content-center mb-3">
                            <img class="img" src="{{ asset('storage/students/' . $student->image) }}">
                        </div>
                        <p class="mb-0 mt-3">Name - {{ $student->name }}</p>
                        <p class="mb-0 mt-3">Std ID - {{ $student->student_no }}</p>
                        <p class="mb-0 mt-3">Batch No. - {{ $student->batch }}</p>
                        <p class="mb-0 mt-3">University - {{ $student->school->name }}</p>
                    </div>
                </div>

                <div class="col-lg-4 d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center custom-card" style="height: 450px;">
                        <p class="mb-0 mt-1" style="font-size: 18px;">MST University</p>
                        <div class="col-md-3 d-flex justify-content-center"
                            style="margin-top: 45px;width:200px;height:200px;margin-bottom:45px;">
                            {!! $student->qrcode !!}
                        </div>
                        <p class="mb-0 mt-3">Scan Here</p>
                    </div>
                </div>

                <div class="col-lg-3 d-flex justify-content-center align-items-center">
                    <div class="row">
                        <a href="{{ route('image', $student->id) }}" class="btn btn-outline-danger mb-3">Export QR
                            Code</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
