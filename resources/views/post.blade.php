@extends("layouts/main")

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $post->title }}</h2>
                <p>By: <a href="/posts?author={{ $post->user->name }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>

                <img src="{{ asset('img/random.jpg') }}" class="card-img-top mx-auto" style="width: 800px; height: 400px; object-fit: cover;" alt="...">
                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
            
                <a href="/posts">Back to posts</a>
            </div>
        </div>
    </div>

@endsection