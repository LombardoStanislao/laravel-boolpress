@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Tutti i post</h1>
                <ul>
                    @foreach ($posts as $post)
                        <a href="{{route('posts.show', ['slug' => $post->slug])}}" class="card text-center mt-50">
                          <h4 class="card-header"> {{$post->post_title}}</h4>
                      </a>
                    @endforeach
                </ul>


            </div>
        </div>
    </div>


@endsection
