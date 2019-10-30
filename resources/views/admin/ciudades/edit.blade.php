@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}">

<div class="container">
    <div class="col-sm-8 offset-sm-2">
        <h2 style="margin-top: 12px;" class="alert alert-dark">Actualizar {{$ciudad->nombre_ciudad}}</h2>
        <br>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('ciudades.update', $ciudad->id_ciudad) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="nombre_ciudad">Nombre Ciudad:</label>
                <input type="text" class="form-control" name="nombre_ciudad" value={{ $ciudad->nombre_ciudad }} />
            </div>
            <button type="submit" class="btn btn-dark">Actualizar</button>
        </form>
    </div>
</div>
@endsection