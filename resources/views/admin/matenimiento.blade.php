@extends('layouts.app')
@section('content')

<ul class="nav">
  <li class="nav-item">
    <a class="nav-link" onclick="getView(`{{ route('servicios')}}`)">Servicios</a>
  <li class="nav-item">
    <a class="nav-link" onclick="getView(`pepe`)">Profesiones</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Barrios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Lista de Usuarios</a>
  </li>
</ul>
<br>
<div class="container" id="respuesta">

</div>
<script type="text/javascript">
 toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
function getView(ruta){
    $.ajax({
      type: "GET",
      url: ruta,
      data: {},
      success: function (data) {
            $('#respuesta').html(data);
      },
      error: function(e){
        toastr["error"](`No encontramos resultados !
        Comunícate con el Administrador
        email: vargasjuan367@gmail.com", "Tenemos Inconvenientes`);
      }
    });
}
</script>
@endsection