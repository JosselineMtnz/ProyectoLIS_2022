 @extends('Navbar')
 @section('title', 'Home')
 @section('header')
     <link rel="stylesheet" href="css/body-home.css">

 @endsection
 @section('navbar')
     <div class="contenedor">
         <h2>BIENVENIDO</h2>
     </div>
     <div class="container">
         <div id="demo" class="carousel slide my-2" data-ride="carousel">

             <!-- Indicators -->
             <ul class="carousel-indicators">
                 <li data-target="#demo" data-slide-to="0" class="active"></li>
                 <li data-target="#demo" data-slide-to="1"></li>
                 <li data-target="#demo" data-slide-to="2"></li>
             </ul>

             <!-- The slideshow -->
             <div class="carousel-inner">
                 <div class="carousel-item active">
                     <img src="https://images.pexels.com/photos/8834095/pexels-photo-8834095.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                         alt="belleza" width="200px" height="100px">
                 </div>
                 <div class="carousel-item">
                     <img src="{{ asset('img/img2.jpg') }}" alt="belleza" width="200px" height="100px">
                 </div>
                 <div class="carousel-item">
                     <img src="{{ asset('img/img3.jpg') }}" alt="belleza" width="200px" height="100px">
                 </div>
             </div>

             <!-- Left and right controls -->
             <a class="carousel-control-prev" href="#demo" data-slide="prev">
                 <span class="carousel-control-prev-icon"></span>
             </a>
             <a class="carousel-control-next" href="#demo" data-slide="next">
                 <span class="carousel-control-next-icon"></span>
             </a>
         </div>
     </div>
     <!--Fin Carousel-->
     <div class="text-contenedor">
         <p class="texto">
             PONTE BONITA PARA TI
         </p>
     </div>
 @endsection
 <!--FOOTER-->





 <script src="https://kit.fontawesome.com/62ea397d3a.js" crossorigin="anonymous"></script>
