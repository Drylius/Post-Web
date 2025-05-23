@extends('layouts/main')

@section('container')
    <h1 class="mb-5">Categories list:</h1>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <a href="/posts?category={{ $category->slug }}">
                        <div class="card text-bg-dark">
                            <img src="{{ asset('img/random.jpg') }}" style="width: auto; height: 400px" class="card-img" alt="...">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.4)">{{ $category->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection