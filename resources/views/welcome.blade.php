@extends('layouts.app')
@section('content')

<link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >

 <div class="flex-center position-ref full-height">
   <div class="content">

      <section id="cta-1">
         <div class="container">
            <div class="row">
               <div class="cta-info text-center" style="padding-right: 3%;
padding-left: 3%;">
                  <h3>
                     <h2>“Le da las herramientas necesarias para que encuentre los servicios que necesita”</h2>
                  </h3>
               </div>
            </div>
         </div>
      </section>
      <section class="section-padding wow fadeInUp delay-02s" id="portfolio">
         <div class="container">
            <div class="row">
               <div class="col-3">
                  <div class="section-title">
                     <h2 class="head-title">Algunos de nuestros servicios</h2>
                     <hr class="botm-line">
                     <p class="sec-para">Le presentamos algunos de los servicios que aquí podra encontrar y que usted
                        puede contrartar con los mejores recursos humanos de la ciudad.
                     </p>
                  </div>
               </div>
               <div class="col-9">
                  <div class="row">
                  @forelse($data['servicios'] as $servicio)
                  <div class="col padding-right-zero">
                     <div class="portfolio-box design">
                        <h1>{{$servicio->nombre_servicio}}</h1>
                     </div>
                  </div>
                  @empty
                      <p>Sin registros</p>
                  @endforelse
               </div>
            </div>
         </div>

      </section>

   </div>
</div>
@endsection