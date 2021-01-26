@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-50">
            <form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="POST">
                @csrf
                @method('PUT')
              <div class="form-group">
                <label for="formGroupExampleInput">Titolo</label>
                <input type="text" class="form-control" placeholder="Titolo" value="{{$post->post_title}}">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Sottotitolo</label>
                <input type="text" class="form-control" placeholder="Sottotitolo" value="{{$post->post_subtitle}}">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Testo del post</label>
                <input type="text" class="form-control" placeholder="Testo" value="{{$post->post_text}}">
              </div>
              <div class="form-group">
                  <button type="submit" name="button" class="btn btn-success">Modifica Post</button>
              </div>
            </form>
        </div>
    </div>


</div>
@endsection
