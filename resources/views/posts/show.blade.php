@extends('layouts.app')

@section('content')
    <a class="btn btn-secondary" href="/posts">Go back</a>
    <h1>{{ $post->title }}</h1>
    <div>
      {{ $post->body }}
    </div>
    <hr>
    <small>Written on {{ $post->created_at }}</small>
@endsection