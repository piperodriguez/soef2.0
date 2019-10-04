@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Estado general del registro</h1>
	<div class="col-sm-12">
	  @if(session()->get('success'))
	    <div class="alert alert-success">
	      {{ session()->get('success') }}
	    </div>
	  @endif
	</div>
	<div class="progress">
		<div class="progress-bar bg-success" style="width:<?= $respuesta['porcentajeGeneral']?>%"></div>
	</div>
	<br>
	<br>
	<div id="accordion">

	  <div class="card">
	  	<input type="hidden" id="estadoPersona" value="{{$respuesta['porcentajePersona']}}">
	    <div class="card-header">
	      <a class="card-link" data-toggle="collapse" href="#collapseOne">
	        <i class="fas fa-user"></i> Información Personal
	      </a>
	    </div>
	    <div id="collapseOne" class="collapse" data-parent="#accordion">
	      <div class="card-body">
	        Estado {{$respuesta['porcentajePersona']}} %
			<div class="progress">
			  <div class="progress-bar bg-success" style="width:<?= $respuesta['porcentajePersona']?>%"></div>
			</div>
			<br>
			<div class="offset-md-11">
				<a href="{{ route('registro.create') }}" class="btn btn-dark">Completar</a>
			</div>
	      </div>
	    </div>
	  </div>

	  <div class="card">
	    <div class="card-header">
	      <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
	        <i class="fas fa-briefcase"></i> Información Laboral
	      </a>
	    </div>
	    <div id="collapseTwo" class="collapse" data-parent="#accordion">
	      <div class="card-body">
	        Estado %
			<div class="progress">
			  <div class="progress-bar bg-success" style="width:0%"></div>
			</div>
			<br>
			<div class="offset-md-11">
				<button class="btn btn-dark" id="laboral">
					<a href="#">Completar</a>
				</button>
			</div>
	      </div>
	    </div>
	  </div>
	  <div class="card">
	    <div class="card-header">
	      <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
	        <i class="fas fa-user-graduate"></i> Información Academica
	      </a>
	    </div>
	    <div id="collapseThree" class="collapse" data-parent="#accordion">
	      <div class="card-body">
	        Estado %
			<div class="progress">
			  <div class="progress-bar bg-success" style="width:0%"></div>
			</div>
			<br>
			<div class="offset-md-11">
				<a href="" class="btn btn-dark">Completar</a>
			</div>
	      </div>
	    </div>
	  </div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var estadoPersona = $("#estadoPersona").val();
		if (estadoPersona == 0) {
			$('#laboral').prop("disabled", true);
		}else{
			$('#laboral').prop("disabled", false);
		}
	});
</script>


@endsection