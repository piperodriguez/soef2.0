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
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('servicios')}}">Servicios</a>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('profesiones')}}">Profesiones</a>
  </li>
  <li class="nav-item">
  	<a class="nav-link" href="{{ route('ciudades.index')}}">Ciudades</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('barrios.index')}}">Barrios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Lista de Usuarios</a>
  </li>
</ul>
<div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
</div>
<div class="container">
<div class="col-sm-12">

    <h2 style="margin-top: 12px;" class="alert alert-dark">Ciudades</h2><br>
    <a href="{{ route('ciudades.create')}}" class="btn btn-info" role="button">Registrar Ciudad</a>
  <table class="table table-striped table-hover">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @forelse ($ciudades as $ciudad)
        <tr>
            <td>{{$ciudad->id_ciudad}}</td>
            <td>{{$ciudad->nombre_ciudad}}</td>
            <td>
                <a href="{{ route('ciudades.edit',$ciudad->id_ciudad)}}" class="btn btn-dark">Edit</a>
            </td>
            <td>
                <form action="{{ route('ciudades.destroy', $ciudad->id_ciudad)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @empty
            <p>No se encuentran registros</p>
        @endforelse
    </tbody>
  </table>
<div>
@endsection