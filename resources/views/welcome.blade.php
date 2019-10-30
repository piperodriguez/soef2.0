@extends('layouts.app')
@section('content')<!-- banner slider -->
<div id="homepage-slider" class="st-slider">
   <input type="radio" class="cs_anchor radio" name="slider" id="play1" checked="" />
   <input type="radio" class="cs_anchor radio" name="slider" id="slide1" />
   <input type="radio" class="cs_anchor radio" name="slider" id="slide2" />
   <input type="radio" class="cs_anchor radio" name="slider" id="slide3" />
   <div class="images">
      <div class="images-inner">
         <div class="image-slide">
            <div class="banner-w3pvt-1">
               <div class="overlay-w3ls">
               </div>
            </div>
         </div>
         <div class="image-slide">
            <div class="banner-w3pvt-2">
               <div class="overlay-w3ls">
               </div>
            </div>
         </div>
         <div class="image-slide">
            <div class="banner-w3pvt-3">
               <div class="overlay-w3ls">
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="labels">
      <div class="fake-radio">
         <label for="slide1" class="radio-btn"></label>
         <label for="slide2" class="radio-btn"></label>
         <label for="slide3" class="radio-btn"></label>
      </div>
   </div>
   <!-- banner-hny-info -->
   <div class="banner-hny-info">
      <h3>Soluciones Eficientes
         <br>¡ a tu alcance !
      </h3>
      <div class="top-buttons mx-auto text-center mt-md-5 mt-3">
         <a href="single.html" class="btn more mr-2">Read More</a>
         <a href="contact.html" class="btn">Contact Us</a>
      </div>
   </div>
   <!-- //banner-hny-info -->
</div>
<!-- //banner slider -->
<!--/ab-->
<section class="banner_bottom py-5">
  <div class="container">
    <div class="cta-info text-center">
      <h2>
      <a class="link-hny" href="services.html">
        “Le da las herramientas necesarias para que encuentre los servicios que necesita”
      </a>
      </h2>
    </div>
  </div>
   <div class="container py-md-5">
      <div class="row inner_sec_info">
         <div class="col-md-6 banner_bottom_grid help">
            <img src="imagenes/servicios.jpg" class="img-fluid" id="imageSoefServices">
         </div>
         <div class="col-md-6 banner_bottom_left mt-lg-0 mt-4">
            <h2 align="center" id="tituloServicios">Algunos de nuestros servicios</h2>
            <hr class="botm-line">
            <p>
            Le presentamos algunos de los servicios que aquí podra encontrar y que usted puede contrartar con los mejores recursos humanos de la ciudad.
            </p>
         </div>
      </div>
      <div class="row features-w3pvt-main" id="features">
        @forelse($data['servicios'] as $servicio)
         <div class="col-md-4 feature-gird">
            <div class="row features-hny-inner-gd">
               <div class="col-md-3 featured_grid_left">
                  <div class="icon_left_grid">
                     <span class="fa fa-globe" aria-hidden="true"></span>
                  </div>
               </div>
               <div class="col-md-9 featured_grid_right_info pl-lg-0">
                  <h4><a class="link-hny" href="single.html">{{$servicio->nombre_servicio}}</a></h4>
                  <ul>
                  @php
                  $servicioid = $servicio->id_servicio;
                  $profesiones = $data['profesionModel'];
                  $profesionesArr = $profesiones::select('nombre_profesion')->where('servicio_id',$servicioid)->get();
                  @endphp
                  @foreach($profesionesArr as $value)
                  <li>{{$value['nombre_profesion']}}</li>
                  @endforeach
                </ul>
               </div>
            </div>
         </div>
        @empty
          <p>Sin registros</p>
        @endforelse
      </div>
   </div>
</section>
<!--//ab-->
<!--/services-->
<section class="services" id="services">
   <div class="over-lay-blue py-5">
      <div class="container py-md-4">
         <div class="row my-4">
            <div class="col-lg-4 services-innfo pr-4">
               <h3 class="tittle-w3ls two mb-3 text-left"><span>SOEF</span></h3>
               <p class="sub-tittle mt-2 mb-sm-3 text-left">Le da las herramientas necesarias para que encuentre el personal adecuado para cumplir con las labores que usted requiere...</p>
               <a href="services.html"><img src="{{ asset('imagenes/logo.jpeg') }}" alt="w3pvt" class="img-fluid"></a>
            </div>
            <div class="col-lg-7 services-grid-inf">
               <div class="row services-w3pvt-main mt-5">
                  <div class="col-lg-6 feature-gird">
                     <div class="row features-hny-inner-gd mt-3">
                        <div class="col-md-2 featured_grid_left">
                           <div class="icon_left_grid">
                             <font color="white"> <i class="fas fa-briefcase"></i></font>
                           </div>
                        </div>
                        <div class="col-md-10 featured_grid_right_info">
                           <h4><a class="link-hny" href="single.html">Misión</a></h4>
                           <p>Ofrecer a nuestros clientes el personal capacitado, para que realicen la labor que ellos necesiten, de una manera fácil, rápida y segura.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 feature-gird">
                     <div class="row features-hny-inner-gd mt-3">
                        <div class="col-md-2 featured_grid_left">
                           <div class="icon_left_grid">
                              <span class="fa fa-bullhorn" aria-hidden="true"></span>
                           </div>
                        </div>
                        <div class="col-md-10 featured_grid_right_info">
                           <h4><a class="link-hny" href="single.html">Visión</a></h4>
                           <p>Ser la empresa de servicios de personal  más confiable y utilizada en el departamento de Boyacá, brindando las mejores soluciones a nuestros clientes.</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row services-w3pvt-main mt-5">
                  <div class="col-lg-6 feature-gird ">
                     <div class="row features-hny-inner-gd mt-3">
                        <div class="col-md-2 featured_grid_left">
                           <div class="icon_left_grid">
                              <span class="fa fa-shield" aria-hidden="true"></span>
                           </div>
                        </div>
                        <div class="col-md-10 featured_grid_right_info">
                           <h4><a class="link-hny" href="single.html">Objetivo
                           </a></h4>
                           <p>La empresa “SOEF” le da las herramientas necesarias al cliente, ya sea una persona natural o jurídica, para que encuentre el personal  adecuado para cumplir ciertas funciones,  este personal lo puede encontrar a través de la página web, o si lo desea puede contratar personal de la empresa “SOEF”.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 feature-gird">
                     <div class="row features-hny-inner-gd mt-3">
                        <div class="col-md-2 featured_grid_left">
                           <div class="icon_left_grid">
                              <span class="fa fa-lightbulb-o" aria-hidden="true"></span>
                           </div>
                        </div>
                        <div class="col-md-10 featured_grid_right_info">
                           <h4><a class="link-hny" href="single.html">Servicios</a></h4>
                           <p>Ofrecemos el servicio de la página web para que los clientes encuentren personal  para trabajos cortos, de una manera fácil, rápida y segura. También “SOEF” presta el servicio de meseros, aseadoras, staff, animadores, entre otros.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection