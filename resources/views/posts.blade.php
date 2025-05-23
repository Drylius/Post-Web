{{-- @dd($post) --}}

@extends('layouts/main')

@section('container')
    <h1 class="mt-2 text-center mb-3">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts" method="GET">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count() > 0)
        <div class="card mb-3">

            @if ($posts[0]->image)
                <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top mx-auto hero-img" style="object-fit: cover" alt="...">                
            @else
                <img src="{{ asset('img/random.jpg') }}" class="card-img-top mx-auto hero-img" alt="...">            
            @endif

            {{-- <img src="{{ asset('img/random.jpg') }}" class="card-img-top mx-auto hero-img" alt="..."> --}}
            <div class="card-body text-center">
                <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
                <p>
                    <small class="text-muted">
                        By: <a href="/posts?author={{ $posts[0]->user->name }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="post-category position-absolute px-3 py-1 rounded text-white" style="background-color: rgba(0, 0, 0, 0.5)">
                                <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">
                                    <p>{{ $post->category->name }}</p>
                                </a>
                            </div>
                            
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mx-auto citizen-img" style="object-fit: contain" alt="...">                
                            @else
                                <img src="{{ asset('img/random.jpg') }}" class="card-img-top mx-auto citizen-img" alt="...">            
                            @endif

                            {{-- <img src="{{ asset('img/random.jpg') }}" class="card-img-top citizen-img" alt="..."> --}}
                            <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                                <p>
                                    <small class="text-muted">
                                        By: <a href="/posts?author={{ $post->user->name }}" class="text-decoration-none">{{ $post->user->name }}</a>{{ $post->created_at->diffForHumans() }}
                                    </small>
                                </p>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>    
                @endforeach
            </div>    
        </div> 
        <div class="tabs d-flex text-center justify-content-center">
            {{ $posts->links() }}
        </div>
    @else
        <p class="text-center fs-4">No post found.</p>
        
    @endif
@endsection