@extends('layouts.app')
@section('content')
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('servicios') }}">Servicios</a>
  <li class="nav-item">
    <a class="nav-link" href="#">Profesiones</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Barrios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Lista de Usuarios</a>
  </li>
</ul>
@endsection