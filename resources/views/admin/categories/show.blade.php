@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-50">
            <div class="all-posts">
                <h1 >Lista post per la categoria: {{$category->name}}  </h1>
                <span>
                    <a href="{{route('admin.posts.create')}}" class="btn btn-success">
                        Aggiungi un post
                    </a>
                </span>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titolo</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category->posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->post_title}}</td>
                            <td>
                                <a class="btn btn-info text-white" href="{{route('admin.posts.show', ['post' => $post->slug] )}}">Visualizza</a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="#">Modifica</a>
                            </td>
                            <td>
                                <form class="" action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" name="button">Elimina</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>


</div>
@endsection
