@extends('layouts.app')
@section('content')
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
    <a class="nav-link" href="#">Barrios</a>
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
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Ciudades</h1>
    <br>
    <a href="{{ route('ciudades.create')}}" class="btn btn-info" role="button">Registrar Ciudad</a>
  <table class="table table-striped">
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
                <a href="{{ route('ciudades.edit',$ciudad->id_ciudad)}}" class="btn btn-primary">Edit</a>
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