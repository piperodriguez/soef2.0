@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}">
<div class="container">
	<h2 style="margin-top: 12px;" class="alert alert-dark">Formación Academica</h2>
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
   <form method="post" action="{{ route('saveFormacion') }}">
      @csrf
      <div class="form-group">
         <label for="nivelFormacion">Nivel de Academico:</label>
         <select class="form-control" id="nivelFormacion" name="nivelFormacion">
            <option selected="">Seleccione</option>
            @foreach($data['nivelEstudio'] as $grado)
            <option value="{{ $grado->id_estudio}}">{{ $grado->descripcion}}</option>
            @endforeach
         </select>
      </div>
      <div class="form-group">
         <label for="inst">Nombre Institución</label>
         <input type="text" name="institucion" class="form-control">
      </div>
      <input type="submit"  value="Guardar" class="btn btn-dark">
   </form>
</div>
@endsection