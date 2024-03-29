@extends('frontend.layout.master')

@section('content_title')
    <h1 class="primary-text">MM Student Portal</h1>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-lg-10 offset-lg-1 authority-form-container">
            <div class="row d-flex">
                <div class="col-12 d-flex justify-content-center text-underline mb-3">My Employee Document List</div>
                <div class="col-md-3 d-flex justify-content-center">
                    <img class="icon" src="{{ asset('storage/schools/' . $image) }}">
                </div>
                <form action="" method="" class="col-md-7 offset-md-2 d-flex flex-column align-items-end">
                    @csrf
                    
                    <div
                        class="custom-form-control-2 rounded w-100 d-flex flex-wrap align-items-center justify-content-around">
                        <p class="mb-0">Authority Name -</p>
                        <input id="authority-name" class="authority-input fw-bold text-dark" value="{{auth()->user()->name}}"
                            disabled>
                    </div>
                    <div id="edit-container" class="d-none col-gap-2 mt-3">
                        <p id="cancel" class="mb-0 primary-text text-underline cursor-pointer">Cancel</p>
                        <button class="border-0 rounded-pill authority-done-btn">Done</button>
                    </div>
                    <div id="filter" class="filter-btn rounded mt-2">
                        <p class="mb-0 fw-bold">Filter</p>
                    </div>

                </form>
            </div>
            <div class="row d-flex justify-content-between flex-wrap col-gap-2 card-container mt-5">

                @foreach ($employees as $emp)
                    <div class="col-lg-4 d-flex justify-content-center">
                        <div class="d-flex flex-column align-items-center custom-card" style="width: 250px;">
                            <div class="col-md-3 d-flex justify-content-center">
                                <img class="icon" src="{{ asset('storage/employee/' . $emp->image) }}">
                            </div>
                            <p class="mb-0 mt-3">Name - {{ $emp->name }}</p>
                            <p class="mb-0 mt-3">Emp ID - {{ $emp->emp_no }}</p>
                            <p class="mb-0 mt-3">Position. - {{ $emp->position }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // document.getElementById('edit').addEventListener('click', function() {
        //     document.getElementById('authority-name').removeAttribute('disabled');
        //     let value = document.getElementById('authority-name').value;
        //     document.getElementById('authority-name').value = "";
        //     document.getElementById('authority-name').placeholder = value;
        //     document.getElementById('edit-container').classList.remove("d-none");
        //     document.getElementById('edit-container').classList.add("d-flex");
        // })

        // document.getElementById('cancel').addEventListener('click', function() {
        //     document.getElementById('authority-name').disabled = true;
        //     let placeholder = document.getElementById('authority-name').placeholder;
        //     document.getElementById('authority-name').value = placeholder;
        //     document.getElementById('authority-name').placeholder = "";
        //     document.getElementById('edit-container').classList.remove("d-flex");
        //     document.getElementById('edit-container').classList.add("d-none");
        //})
    </script>
@endsection
