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
                    @if($msg == 1)
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
      "positionClass": "toast-top-full-width",
      "preventDuplicates": true,
      "showDuration": "5000",
      "hideDuration": "10000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    if (alerta == 1) {
        toastr["warning"]("Completa tu información personal ", "! Importante ¡");
    }

</script>
@endsection
