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
                        <center>
                           <h3>{{$servicio->nombre_servicio}}</h3>
                        </center>
                        <ul>
                        @php
                           $servicioid = $servicio->id_servicio;
                           $profesiones = $data['profesionModel'];
                           $profesionesArr = $profesiones::find($servicioid);
                        @endphp
                           <li>{{$profesionesArr['nombre_profesion']}}</li>
                        </ul>
                     </div>
                  </div>
                  @empty
                      <p>Sin registros</p>
                  @endforelse
               </div>
            </div>
         </div>

      </section>
<section id="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3 wow fadeInLeft delay-05s">
          <div class="section-title">
            <img src="{{ asset('imagenes/logo.jpeg') }}" class="img-responsive img-rounded" id="logoIndex">
            <hr class="botm-line">
            <p class="sec-para">Le da las herramientas necesarias para que encuentre el personal adecuado para cumplir con las labores que usted requiere.</p>
          </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-6 wow fadeInRight delay-02s">
            <div class="icon">
              <i class="fa fa-lightbulb-o"></i>
            </div>
            <div class="icon-text">
              <h3 class="txt-tl">Misión</h3>
              <p class="txt-para">Ofrecer a nuestros clientes el personal capacitado, para que realicen la labor que ellos necesiten, de una manera fácil, rápida y segura.</p>
            </div>
          </div>
          <div class="col-md-6 wow fadeInRight delay-02s">
            <div class="icon">
              <i class="fa fa-clock-o"></i>
            </div>
            <div class="icon-text">
              <h3 class="txt-tl">Visión</h3>
              <p class="txt-para">Ser la empresa de servicios de personal  más confiable y utilizada en el departamento de Boyacá, brindando las mejores soluciones a nuestros clientes. </p>
            </div>
          </div>
          <div class="col-md-6 wow fadeInRight delay-04s">
            <div class="icon">
              <i class="fa fa-cogs"></i>
            </div>
            <div class="icon-text">
              <h3 class="txt-tl">Objetivo</h3>
              <p class="txt-para">La empresa “SOEF” le da las herramientas necesarias al cliente, ya sea una persona natural o jurídica, para que encuentre el personal  adecuado para cumplir ciertas funciones,  este personal lo puede encontrar a través de la página web, o si lo desea puede contratar personal de la empresa “SOEF”.</p>
            </div>
          </div>
          <div class="col-md-6 wow fadeInRight delay-04s">
            <div class="icon">
              <i class="fa fa-user-check"></i>
            </div>
            <div class="icon-text">
              <h3 class="txt-tl">Servicios</h3>
              <p class="txt-para">Ofrecemos el servicio de la página web para que los clientes encuentren personal  para trabajos cortos, de una manera fácil, rápida y segura. También “SOEF” presta el servicio de meseros, aseadoras, staff, animadores, entre otros.</p>
            </div>
          </div>
         <!-- <div class="col-md-6 wow fadeInRight delay-06s">
            <div class="icon">
              <i class="fa fa-lightbulb-o"></i>
            </div>
            <div class="icon-text">
              <h3 class="txt-tl">High Coversion</h3>
              <p class="txt-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id ligula felis euismod semper. </p>
            </div>
          </div>
          <div class="col-md-6 wow fadeInRight delay-06s">
            <div class="icon">
              <i class="fa fa-clock-o"></i>
            </div>
            <div class="icon-text">
              <h3 class="txt-tl">Save Tons of Time</h3>
              <p class="txt-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id ligula felis euismod semper. </p>
            </div>
          </div>-->
        </div>
      </div>
    </div>
  </section>
   </div>
</div>
@endsection