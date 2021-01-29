@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-left">
                <a href="{{route('posts.index')}}" class="btn btn-success">Torna a tutti i post</a>
            </div>
            <div class="col-12">
                <ul>
                    <div class="card text-center mt-50">
                      <h4 class="card-header"> {{$post->post_title}}</h4>
                      <div class="card-body">
                        <h5 class="card-title">{{$post->post_subtitle}}</h5>
                        <p class="card-text">{{$post->post_text}}</p>
                      </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>


@endsection
