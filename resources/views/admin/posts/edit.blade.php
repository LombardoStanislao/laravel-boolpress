@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-50">
            <form action="{{route('admin.posts.update', ['post' => $post->slug])}}" method="POST">
                @csrf
                @method('PUT')
              <div class="form-group">
                <label>Titolo</label>
                <input type="text" class="form-control" placeholder="Titolo" name="post_title" value="{{$post->post_title}}">
              </div>
              <div class="form-group">
                <label>Sottotitolo</label>
                <input type="text" class="form-control" placeholder="Sottotitolo" name="post_subtitle" value="{{$post->post_subtitle}}">
              </div>
              <div class="form-group">
                <label>Testo del post</label>
                <textarea class="form-control" rows="8" name="post_text" placeholder="Scrivi il testo del post qui...">{{$post->post_text}}</textarea>
              </div>
              <div class="form-group">
                <label>Categoria</label>
                <select class="form-control" name="category_id">
                    <option value="">Seleziona una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected=selected' : ''}}>
                            {{$category->name}}
                        </option>
                    @endforeach

                </select>

                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tags[]"
                        {{ $post->tags->contains($tag) ? 'checked=checked' : ''}}>
                        <label class="form-check-label">{{$tag->name}}</label>
                    </div>

                @endforeach
              </div>
              <div class="form-group">
                  <button type="submit" name="button" class="btn btn-success">Modifica Post</button>
              </div>
            </form>
        </div>
    </div>


</div>
@endsection
