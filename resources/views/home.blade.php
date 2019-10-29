@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}">
<input type="hidden" id="alerta" value="{{$msg}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="welcomeContenedor">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Bienvenido {{ Auth::user()->username }}!
                    <br>
                    @switch($msg)
                        @case(0)
                          <h3>Estado del registro <?=$msg?>%</h3>
                         <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?= $msg?>%"></div>
                         </div>
                          <br>
                          <center><a class="btn btn-dark" href="{{ route('registro.index') }}">
                            <font color="#ffffff">Completar Hoja de Vida</font>
                          </a></center>
                            @break
                        @case(33.3)
                          <h3>Estado del registro <?=$msg?>%</h3>
                          <div class="progress">
                            <div class="progress-bar bg-info" style="width:<?=$msg?>%"></div>
                          </div>
                          <br>
                          <center><a class="btn btn-dark" href="{{ route('registro.index') }}">
                            <font color="#ffffff">Completar Hoja de Vida</font>
                          </a></center>
                            @break
                        @case(66)
                          <h3>Estado del registro <?=$msg?>%</h3>
                          <div class="progress">
                            <div class="progress-bar bg-info" style="width:<?=$msg?>%"></div>
                          </div>
                          <br>
                          <center><a class="btn btn-dark" href="{{ route('registro.index') }}">
                            <font color="#ffffff">Completar Hoja de Vida</font>
                          </a></center>
                            @break
                        @default
                    @endswitch
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-bottom-right",
      "preventDuplicates": true,
      "showDuration": "10000",
      "hideDuration": "10000",
      "timeOut": "9000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

    var alerta = parseFloat($("#alerta").val());

    switch (alerta) {
      case 0:
        toastr["warning"]("Completa tu información personal ", "! Importante ¡");
        break;
      case 33.3:
        toastr["info"]("Muy bien ya casi completas tu información personal ", "! Importante ¡");
        break;
      case 66:
        toastr["info"]("Completa la información Academica ! ", "! Importante ¡");
        break;
      default:

    }



</script>
@endsection
