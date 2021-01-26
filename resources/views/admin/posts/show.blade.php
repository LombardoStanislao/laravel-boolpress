@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-50">
            <div class="card text-center">
              <h5 class="card-header">ID: {{$post->id}}</h5>
              <div class="card-body">
                <h4 class="card-title">{{$post->post_title}}</h4>
                <h3 class="card-title">{{$post->post_subtitle}}</h3>
                <p class="card-text">{{$post->post_text}}</p>
                <a href="{{route('admin.posts.edit', ['post' => $post->id])}}" class="btn btn-warning">Modifica</a>
              </div>
            </div>
        </div>
    </div>


</div>
@endsection
