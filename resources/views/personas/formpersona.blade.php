@extends('layouts.app')

@section('content')


<div class="container">

	<div id="accordion">

	  <div class="card">
	    <div class="card-header">
	      <a class="card-link" data-toggle="collapse" href="#collapseOne">
	        <i class="fas fa-user"></i> Información Personal
	      </a>
	    </div>
	    <div id="collapseOne" class="collapse" data-parent="#accordion">
	      <div class="card-body">
	        Estado %
			<div class="progress">
			  <div class="progress-bar bg-success" style="width:10%"></div>
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
			  <div class="progress-bar bg-success" style="width:10%"></div>
			</div>
			<br>
			<div class="offset-md-11">
				<a href="" class="btn btn-dark">Completar</a>
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
			  <div class="progress-bar bg-success" style="width:10%"></div>
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


@endsection