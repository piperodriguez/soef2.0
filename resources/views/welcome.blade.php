@extends('layouts.app')
@section('content')
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  </style>
 <div class="flex-center position-ref full-height">
   <div class="content">
      <div id="demo" class="carousel slide" data-ride="carousel">
         <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
         </ul>
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img src="{{URL::asset('/imagenes/object.png')}}" alt="Soluciones" width="100%" height="500">
               <div class="carousel-caption">
                  <h3><font color="black">Soluciones</font></h3>
               </div>
            </div>
            <div class="carousel-item">
               <img src="{{URL::asset('/imagenes/home2.png')}}" alt="Eficientes" width="100%" height="500">
               <div class="carousel-caption">
                  <h3><font color="black">Eficientes</font></h3>
               </div>
            </div>
            <div class="carousel-item">
               <img src="{{URL::asset('/imagenes/home3.jpg')}}" alt="New York" width="100%" height="500">
               <div class="carousel-caption">
                  <h3><font color="black">¡ a tu alcance !</font></h3>
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#demo" data-slide="prev">
         <span class="carousel-control-prev-icon"></span>
         </a>
         <a class="carousel-control-next" href="#demo" data-slide="next">
         <span class="carousel-control-next-icon"></span>
         </a>
      </div>
      <section id="cta-1">
         <div class="container">
            <div class="row">
               <div class="cta-info text-center">
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
               <div class="col-md-3 col-sm-12">
                  <div class="section-title">
                     <h2 class="head-title">Algunos de nuestros servicios</h2>
                     <hr class="botm-line">
                     <p class="sec-para">Le presentamos algunos de los servicios que aquí podra encontrar y que usted
                        puede contrartar con los mejores recursos humanos de la ciudad.
                     </p>
                  </div>
               </div>
               <div class="col-md-9 col-sm-12">
                  <div class="col-md-4 col-sm-6 padding-right-zero">
                     <div class="portfolio-box design">
                        <h2>nombre progesion</h2>
                     </div>
                     <div class="portfolio-box design">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>
@endsection