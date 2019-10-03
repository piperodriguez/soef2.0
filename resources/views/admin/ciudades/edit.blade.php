@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Actualizar Ciudad</h1>

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
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection