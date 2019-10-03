@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Actualizar Barrio</h1>

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
        <form method="post" action="{{ route('barrios.update', $barrio->id_barrio) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <select name="ciudad_id" class="form-control">
                    <option selected="">{{$barrio->ciudadBarrio($ciudad_id)['nombre_ciudad']}}</option>
                    @foreach($ciudades as $ciudad)
                       <option value="{{ $ciudad->id_ciudad}}">{{ $ciudad->nombre_ciudad}}</option>
                     @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nombre_ciudad">Nombre Barrio:</label>
                <input type="text" class="form-control" name="nombre_barrio" value="{{ $barrio->nombre_barrio }}" />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection