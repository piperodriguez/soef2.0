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
	    		<?php
	    		echo "<pre>";
	    			var_dump($perfil);
	    		echo "</pre>";
	    		?>

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
		  <figcaption class="figure-caption">A caption for the above image.</figcaption>
		</figure>
    </div>
  </div>
</div>
@endsection