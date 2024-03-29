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
<div class="container">
	 <div class="col-sm-5 offset-sm-2">
	    <h1 class="display-6">Perfil Profesional</h1>
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
	      <form method="post" action="{{ route('perfilProfesional.store') }}">
	          @csrf
	          <div class="form-group">
	          	<label for="servicio"> Servicio:</label>
				<select name="servicio" id="servicio" class="form-control" onchange="getServicio()">
						<option selected="">Seleccione Un servicio</option>
					@foreach($respuesta['servicios'] as $servicio)
				       <option value="{{ $servicio->id_servicio}}">{{ $servicio->nombre_servicio}}</option>
				     @endforeach
				</select>
	          </div>
	          <div class="form-group">
	          	<label for="profesion_id"> Profesión:</label>
				<select name="profesion_id" id="profesion_id" class="form-control">

				</select>
	          </div>
	          <div class="form-group">
	              <label for="titulo"> Cargo o título:</label>
	              <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}"/>
	          </div>
              <div class="form-group">
	              <label for="descripcion"> Descripción:</label>
  				  <textarea class="form-control" name="descripcion" rows="5" value="{{ old('descripcion') }}"></textarea>
			  </div>
	          <button type="submit" class="btn btn-dark">guardar</button>
	      </form>
	  </div>
	</div>
</div>
<script type="text/javascript">
function getServicio(){
	var id_servicio = $("#servicio").val();
	$.ajax({
		type: "GET",
		url: "{{ url('getProfesion')}}"+'/'+id_servicio,
		success: function(data){
            $("select#profesion_id").html(data);
		},
		async: true
		});
	}
</script>
@endsection