@extends('layouts/main')

@section('container')
<div style="font-family: 'Times New Roman', Times, serif" class="outer-div">
    <div class="about-card">
        <h1 class="text-center mb-3">About this web</h1>
        <p style="font-size: 1.5rem" class="text-center">A website for users to create and share their posts.
            <br>
            This website was created while learning about PHP framework laravel.
        </p>
    </div>

    <div class="row mt-5" style="display: flex; justify-content:center;">
        <div class="col-md-6" style="width: 600px; align-self:center"> 
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"> 
                <div class="col-auto d-none d-lg-block"> 
                    <img aria-label="Placeholder: Thumbnail" class="bd-placeholder-img " height="300" preserveAspectRatio="xMidYMid slice" role="img" width="auto" xmlns="http://www.w3.org/2000/svg" src="{{ asset('img/photo.jpg') }}" style="object-fit: cover">
                    <rect width="100%" height="100%" fill="#55595c"></rect>
                </div> 
                <div class="col p-4 d-flex flex-column position-static"> 
                    <strong class="d-inline-block mb-2 text-success-emphasis" style="font-size: 1.5rem">Here is my contact</strong> 
                    <h3 class="mb-3 mt-5" style="font-size: 2rem">Drylius Christian Cong</h3>
                    <p class="mb-auto" style="font-size: 1.3rem">
                        Email: {{ $email }}
                        <br>
                        Phone: +6282162832503
                    </p> 
                </div> 
            </div> 
        </div> 
    </div>
</div>
@endsection