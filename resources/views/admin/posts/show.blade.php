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
                <h6 class="card-text">Categoria: {{$post->category ? $post->category->name : '-'}}</h6>
                <a href="{{route('admin.posts.edit', ['post' => $post->slug])}}" class="btn btn-warning">Modifica</a>
                <form class="d-inline-block" action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" name="button">Elimina</button>
                </form>
              </div>
            </div>
        </div>
    </div>


</div>
@endsection
