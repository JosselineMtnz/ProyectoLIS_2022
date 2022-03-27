 @extends('Navbar')
 @section('title', 'Home')
 @section('header')
 <link rel="stylesheet" href="css/body-home.css">
   
 @endsection
  @section('navbar')
  <div class="contenedor">
    <h2>BIENVENIDO</h2>
  </div>
  <div class="slide-contenedor">
    <div class="miSlider fade">
      <img src="https://images.pexels.com/photos/3997989/pexels-photo-3997989.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="" />
    </div>
    <div class="miSlider fade">
      <img src="img/img2.jpg" alt="" />
    </div>
    <div class="miSlider fade">
      <img src="img/img3.jpg" alt="" />
    </div>
    <div class="direcciones">
      <a href="#" class="atras" onclick="avanzaSlide(-1)">&#10094;</a>
      <a href="#" class="adelante" onclick="avanzaSlide(1)">&#10095;</a>
    </div>
    <div class="barras">
      <span class="barra activado" onclick="posicionSlide(1)"></span>
      <span class="barra" onclick="posicionSlide(2)"></span>
      <span class="barra" onclick="posicionSlide(3)"></span>
    </div>
  </div>
  <!--Fin Carousel-->
  <div class="text-contenedor">
    <p class="texto">
      PONTE BONITA PARA TI
    </p>
  </div>
  @endsection
    <!--Carousel-->
    
   
    
    <script src="js/Carousel.js"></script>
    <script
      src="https://kit.fontawesome.com/62ea397d3a.js"
      crossorigin="anonymous"
    ></script>

