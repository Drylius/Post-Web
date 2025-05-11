@extends('layouts/main')

@section('container')

<h1 class="my-3 text-center" style="font-family: Georgia, 'Times New Roman', Times, serif">Hello! Welcome {{ auth()->user()->name }}, here are the latest posts</h1>
<div class="container">
    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis background-with-transparency" style="background-image: url('{{ asset('storage/' . $posts[0]->image) }}');"> <div class="col-lg-6 px-0"> <h1 class="display-4 fst-italic">{{ $posts[0]->title }}</h1> <p class="lead my-3">{{ $posts[0]->excerpt }}</p> <p class="lead mb-0"><a href="/posts/{{ $posts[0]->slug }}" class="fw-bold text-secondary">Continue reading...</a></p> </div> </div>

    <div class="row mb-2"> 
        <div class="col-md-6"> 
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"> 
                <div class="col p-4 d-flex flex-column position-static"> 
                    <strong class="d-inline-block mb-2 text-primary-emphasis">{{ $posts[1]->category->name }}</strong> 
                    <h3 class="mb-0">{{ $posts[1]->title }}</h3> 
                    <div class="mb-1 text-body-secondary">{{ $posts[1]->created_at->diffForHumans() }}</div> 
                    <p class="card-text mb-auto">{{ $posts[1]->excerpt }}</p> 
                    <a href="/posts/{{ $posts[1]->slug }}" class="icon-link gap-1 icon-link-hover stretched-link">
                        Continue reading
                        <svg class="bi" aria-hidden="true"><use xlink:href="#chevron-right"></use></svg> 
                    </a> 
                </div> 
                <div class="col-auto d-none d-lg-block"> 
                    <img aria-label="Placeholder: Thumbnail" class="bd-placeholder-img " height="250" preserveAspectRatio="xMidYMid slice" role="img" width="200" xmlns="http://www.w3.org/2000/svg" src="{{ $posts[1]->image ? asset('storage/' . $posts[1]->image) : asset('img/random.jpg') }}">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#55595c"></rect>
                </div> 
            </div> 
        </div> 
    
        <div class="col-md-6"> 
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"> 
                <div class="col p-4 d-flex flex-column position-static"> 
                    <strong class="d-inline-block mb-2 text-success-emphasis">{{ $posts[2]->category->name }}</strong> 
                    <h3 class="mb-0">{{ $posts[2]->title }}</h3> <div class="mb-1 text-body-secondary">{{ $posts[2]->created_at->diffForHumans() }}</div> 
                    <p class="mb-auto">{{ $posts[2]->excerpt }}</p> 
                    <a href="/posts/{{ $posts[2]->slug }}" class="icon-link gap-1 icon-link-hover stretched-link">
                        Continue reading
                     <svg class="bi" aria-hidden="true"><use xlink:href="#chevron-right"></use></svg> 
                    </a> 
                </div> 
                <div class="col-auto d-none d-lg-block"> 
                    <img aria-label="Placeholder: Thumbnail" class="bd-placeholder-img " height="250" preserveAspectRatio="xMidYMid slice" role="img" width="200" xmlns="http://www.w3.org/2000/svg" src="{{ $posts[2]->image ? asset('storage/' . $posts[2]->image) : asset('img/random.jpg') }}">
                    <rect width="100%" height="100%" fill="#55595c"></rect>
                </div> 
            </div> 
        </div> 
    </div>
</div>
    
@endsection