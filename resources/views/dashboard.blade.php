@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    {{-- {{ __('You are logged in!') }} --}}
                    <a href="/posts/create" class="btn btn-primary mb-3">Create Post</a>
                    <h3>Your Blog Posts</h3>
                    @if (count($posts) > 0)
                      <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th width="20%"></th>
                            <th width="20%"></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($posts as $post)
                          <tr>
                            <td class="align-middle"><strong>{{$post->title}}</strong></td>
                            <td class="text-center align-middle">
                              <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                            </td>
                            <td class="text-center">
                              {!!Form::open([
                                'action' => ['App\Http\Controllers\PostsController@destroy', $post->id],
                                'method' => 'POST',
                                'class' => ''
                              ])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                              {!!Form::close()!!}
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    @else
                      <p>You have no posts.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
