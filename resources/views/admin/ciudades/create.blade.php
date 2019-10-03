@extends('layouts.app')
@section('content')
<div class="row">
	 <div class="col-sm-5 offset-sm-2">
	    <h1 class="display-3">Nueva Ciudad</h1>
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