@extends('layouts.app')

@section('content')
<input type="hidden" id="alerta" value="{{$msg}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Bienvenido {{ Auth::user()->username }}!
                    <br>
                    @if($msg == 33.3)
                          <h1>Muy bien ya completaste parte del registro !  </h1>
                          <div class="progress">
                            <div class="progress-bar bg-info" style="width:33%"></div>
                          </div>
                          <br>
                        <center>
                            <a class="btn btn-dark" href="{{ route('registro.index') }}"><font color="#ffffff">Completar información</font></a>
                        </center>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    var alerta = $("#alerta").val();

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
    if (alerta == 33.3) {
        toastr["warning"]("Completa tu información personal ", "! Importante ¡");
    }

</script>
@endsection
