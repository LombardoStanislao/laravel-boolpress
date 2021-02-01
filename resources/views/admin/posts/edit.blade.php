@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-50">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{$error}}</li>

                         @endforeach
                    </ul>

                </div>

            @endif
            <form action="{{route('admin.posts.update', ['post' => $post->slug])}}" method="POST">
                @csrf
                @method('PUT')
              <div class="form-group">
                <label>Titolo</label>
                <input type="text" class="form-control" placeholder="Titolo" name="post_title" value="{{ old('post_title', $post->post_title) }}">
                @error ('post_title')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label>Sottotitolo</label>
                <input type="text" class="form-control" placeholder="Sottotitolo" name="post_subtitle" value="{{ old('post_subtitle', $post->post_subtitle ) }}">
                @error ('post_subtitle')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label>Testo del post</label>
                <textarea class="form-control" rows="8" name="post_text" placeholder="Scrivi il testo del post qui...">{{ old('post_text', $post->post_text )}}</textarea>
                @error ('post_text')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label>Categoria</label>
                <select class="form-control" name="category_id">
                    <option value="">Seleziona una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{$category->id == old('category_id', $post->category_id)  ? 'selected=selected' : ''}}>
                            {{$category->name}}
                        </option>
                    @endforeach
                    @error ('category_id')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror

                </select>

                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        @if ($errors->any())
                            <input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tags[]"
                            {{in_array($tag->id, old('tags', [])) ? 'checked=checked' : ''}}>
                        @else
                            <input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tags[]"
                            {{ $post->tags->contains($tag) ? 'checked=checked' : ''}}>
                        @endif

                        <label class="form-check-label">{{$tag->name}}</label>
                    </div>

                @endforeach
                @error ('tags')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                  <button type="submit" name="button" class="btn btn-success">Modifica Post</button>
              </div>
            </form>
        </div>
    </div>


</div>
@endsection
