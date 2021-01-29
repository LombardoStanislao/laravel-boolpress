@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-50">
            <div class="all-posts">
                <h1 >Tutte le categorie</h1>
                <span>
                    <a href="{{route('admin.categories.create')}}" class="btn btn-success">
                        Aggiungi una categoria
                    </a>
                </span>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categoria</th>
                        <th>Slug</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>
                                <a class="btn btn-info" href="{{route('admin.categories.show', ['category' => $category->id])}}">Visualizza</a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{route('admin.categories.edit', ['category' => $category->id])}}">Modifica</a>
                            </td>
                            <td>
                                <form class="" action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="POST">
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
