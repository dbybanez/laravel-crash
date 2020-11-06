@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-4">
                    <img class="w-100" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                  </div>
                  <div class="col-8">
                    <h3 class="mb-0">{{ $post->title }}</h3>
                    <small>Written on {{ $post->created_at }} by <strong>{{ $post->user->name }}</strong></small>
                  </div>
                </div>
                <a class="stretched-link" href="/posts/{{ $post->id }}"></a>
              </div>
            </div>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>No posts found.</p>
    @endif
@endsection