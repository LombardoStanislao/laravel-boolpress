@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Benvenuto {{$user->name}}</h1>
                </div>
                <div class="card-body">
                    <dl>
                        <dt>Nome</dt>
                        <dd>{{ Auth::user()->name }}</dd>
                        <dt>Email</dt>
                        <dd>{{ Auth::user()->email}}</dd>
                        <dt>API Token</dt>
                        @if (Auth::user()->api_token)
                            <dd>{{Auth::user()->api_token}}</dd>
                        @else
                            <form action="{{route('admin.generate_token')}}" method="post">
                                @csrf
                                <button class="btn btn-info" type="submit" name="button">Genera API Token</button>
                            </form>

                        @endif

                    </dl>
                </div>

            </div>

        </div>
    </div>


</div>
@endsection
