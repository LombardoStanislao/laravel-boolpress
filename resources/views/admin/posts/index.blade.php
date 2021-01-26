@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-50">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titolo</th>
                        <th>Sottotitolo</th>
                        <th>Slug</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->post_title}}</td>
                            <td>{{$post->post_subtitle}}</td>
                            <td>{{$post->slug}}</td>
                            <td>
                                <a class="btn btn-info text-white" href="{{route('admin.posts.show', ['post' => $post->id] )}}">Visualizza</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>


</div>
@endsection
