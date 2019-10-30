@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}">
<div class="container">
	 <div class="col-sm-5 offset-sm-2">
	 	<h2 style="margin-top: 12px;" class="alert alert-dark">Registrar Ciudad</h2>
	  <div>
	    @if ($errors->any())
	      <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	              <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	      </div><br />
	    @endif
	      <form method="post" action="{{ route('ciudades.store') }}">
	          @csrf
	          <div class="form-group">
	              <label for="nombre_ciudad"> Nombre Ciudad:</label>
	              <input type="text" class="form-control" name="nombre_ciudad"/>
	          </div>
	          <button type="submit" class="btn btn-dark">guardar</button>
	      </form>
	  </div>
	</div>
</div>
@endsection