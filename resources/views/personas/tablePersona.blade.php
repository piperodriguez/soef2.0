@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}">
<style type="text/css">
.copy_right.p-3.d-flex {
    position: inherit !important;
    margin-bottom: 0;
    width: 100%;
    margin-top: 4%;
}
</style>
<div class="row">
	 <div class="col-sm-5 offset-sm-2">
	    <h1 class="display-6">Información Personal</h1>
	  <div>
	    @if ($errors->any())
	      <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	              <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	      </div><br/>
	    @endif
	      <form method="post" action="{{ route('registro.store') }}">
	          @csrf
	          <div class="form-group">
	              <label for="nombre_persona"> Nombres:</label>
	              <input type="text" class="form-control" name="nombre_persona" value="{{ old('nombre_persona') }}">
	          </div>
	          <div class="form-group">
	              <label for="apellido_persona"> Apellidos:</label>
	              <input type="text" class="form-control" name="apellido_persona" value="{{ old('apellido_persona') }}"/>
	          </div>
	          <div class="form-group">
	              <label for="celular"> Celular:</label>
	              <input type="text" class="form-control" name="celular" value="{{ old('celular') }}"/>
	          </div>
	          <div class="form-group">
	          	<label for="ciudad_id"> Ciudad:</label>
				<select name="ciudad_id" id="ciudad_id" class="form-control" value="{{ old('ciudad_id') }}" onchange="getBarrios()">
						<option selected="">Seleccione la Ciudad</option>
					@foreach($respuesta['ciudades'] as $ciudad)
				       <option value="{{ $ciudad->id_ciudad}}">{{ $ciudad->nombre_ciudad}}</option>
				     @endforeach
				</select>
	          </div>
	          <div class="form-group">
	          	<label for="barrio_id"> Barrio:</label>
				<select name="barrio_id" id="barrio_id" class="form-control">

				</select>
	          </div>
	          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
	          <button type="submit" class="btn btn-dark">guardar</button>
	      </form>
	  </div>
	</div>
</div>

<br><br><br>
<script type="text/javascript">
function getBarrios(){
	var id_ciudad = $("#ciudad_id").val();
	$.ajax({
		type: "GET",
		url: "{{ url('getBarrio')}}"+'/'+id_ciudad,
		success: function(data){
            $("select#barrio_id").html(data);
		},
		async: true
		});
	}
</script>

@endsection