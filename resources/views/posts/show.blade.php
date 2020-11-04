@extends('layouts.app')

@section('content')
    <a class="btn btn-secondary" href="/posts">Go back</a>
    <h1>{{ $post->title }}</h1>
    <div>
      {!! $post->body !!}
    </div>
    <hr>
    <small>Written on {{ $post->created_at }}</small>
    <hr>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

    {!!Form::open([
      'action' => ['App\Http\Controllers\PostsController@destroy', $post->id],
      'method' => 'POST',
      'class' => 'float-right'
    ])!!}
      {{Form::hidden('_method', 'DELETE')}}
      {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection