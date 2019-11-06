@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}">
<style type="text/css">
	i#iconProfesion {
    color: black;
}
i#iconAcademico {
    color: black;
}

</style>
<div class="container">
  <div class="row offset-md-1">
    <div class="col-md-7" style="background-color: whitesmoke;">
	  <div class="card bg-light text-white">
	    <div class="card-body">
	    	<h2>
	    		<i class="fas fa-balance-scale" id="iconProfesion"></i>
	    		<font color="black">Perfil profesional</font>
	    	</h2>
	    	<ul>
	    	@foreach($dataPerfil as $perfil)
	    		<li>
	    			<font color="black"><b>{{$perfil->titulo}}</b></font>
	    			<ul>
	    				<li><font color="black">{{$perfil->descripción}}</font></li>
	    			</ul>
	    		</li>

	    	@endforeach
	    	</ul>
	    </div>
	  </div>
	  <div class="card bg-light text-white">
	    <div class="card-body">
	    	<h2>
	    		<i class="fas fa-book-open" id="iconAcademico"></i>
	    		<font color="black">Información academica</font>
	    	</h2>
	    </div>
	  </div>
    </div>
    <div class="col-md-4" style="background-color: whitesmoke;">
      <figure class="figure">
		  <img class="figure-img img-fluid rounded" src="/storage/avatars/{{ Auth::user()->avatar }}" style="height: 300px;" />
		  <figcaption class="figure-caption">
		  	<span><b>Nombre:</b></span>
		  	{{$inforPersonal->nombre}} {{$inforPersonal->apellido}}
		  	<br>
		  	<span><b>Email:</b></span>
		  	{{$inforPersonal->email}}
		  	<br>
		  	<span><b>Celular:</b></span>
		  	{{$inforPersonal->celular}}
		  	<br>
		  	<span><b>Ciudad:</b></span>
		  	{{$inforPersonal->nombre_ciudad}}
		  	<br>
		  	<span><b>Barrio:</b></span>
		  	{{$inforPersonal->nombre_barrio}}}
		  </figcaption>
		</figure>
    </div>
  </div>
</div>
@endsection