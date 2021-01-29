@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-50">
            <form action="{{route('admin.categories.store')}}" method="POST">
                @csrf
              <div class="form-group">
                <label>Nome categoria</label>
                <input type="text" class="form-control" placeholder="Titolo" name="name">
              </div>
              <div class="form-group">
                  <button type="submit" name="button" class="btn btn-success">Aggiungi Categoria</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
