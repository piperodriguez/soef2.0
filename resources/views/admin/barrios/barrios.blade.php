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
    <h2 style="margin-top: 12px;" class="alert alert-dark">Lista de Barrios</h2>
    <br>
    <a href="{{ route('barrios.create')}}" class="btn btn-info" role="button">Registrar Barrio</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Ciudad</td>
          <td>Barrio</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @forelse ($barrios as $barrio)
        <tr>
            <td>{{$barrio->id_barrio}}</td>
            <td>{{$barrio->ciudad['nombre_ciudad']}}</td>
            <td>{{$barrio->nombre_barrio}}</td>
            <td>
                <a href="{{ route('barrios.edit',$barrio->id_barrio)}}" class="btn btn-dark">Edit</a>
            </td>
            <td>
                <form action="{{ route('barrios.destroy', $barrio->id_barrio)}}" method="post">
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