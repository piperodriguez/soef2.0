@extends('layouts.app')
@section('content')
<div class="row">
	 <div class="col-sm-5 offset-sm-2">
	    <h1 class="display-3">Nuevo Barrio</h1>
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
	      <form method="post" action="{{ route('barrios.store') }}">
	          @csrf
	          <div class="form-group">
				<select name="ciudad_id" class="form-control">
						<option selected="">Seleccione la Ciudad</option>
					@foreach($ciudades as $ciudad)
				       <option value="{{ $ciudad->id_ciudad}}">{{ $ciudad->nombre_ciudad}}</option>
				     @endforeach
				</select>
	          </div>
	          <div class="form-group">
	              <label for="nombre_barrio"> Nombre Barrio:</label>
	              <input type="text" class="form-control" name="nombre_barrio"/>
	          </div>
	          <button type="submit" class="btn btn-dark">guardar</button>
	      </form>
	  </div>
	</div>
</div>
@endsection