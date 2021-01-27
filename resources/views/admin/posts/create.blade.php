@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-50">
            <form action="{{route('admin.posts.store')}}" method="POST">
                @csrf
              <div class="form-group">
                <label>Titolo</label>
                <input type="text" class="form-control" placeholder="Titolo" name="post_title">
              </div>
              <div class="form-group">
                <label>Sottotitolo</label>
                <input type="text" class="form-control" placeholder="Sottotitolo" name="post_subtitle">
              </div>
              <div class="form-group">
                <label>Testo del post</label>
                <textarea class="form-control" rows="8" name="post_text" placeholder="Scrivi il testo del post qui..."></textarea>
              </div>
              <div class="form-group">
                <label>Categoria</label>
                <select class="form-control" name="category_id">
                    <option value="">Seleziona una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>
              </div>
              <div class="form-group">
                  <button type="submit" name="button" class="btn btn-success">Crea nuovo post</button>
              </div>
            </form>
        </div>
    </div>


</div>
@endsection
