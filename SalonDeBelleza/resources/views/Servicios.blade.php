@section('header')
<link rel="stylesheet" href="css/body-servicios.css">
  
@endsection
@section('title', 'Servicios')

  
    <!--Navegacion y Sidebar-->
    @extends('Navbar')
    @section('navbar')
    <div class="seccion">
      <h2>Nuestros Servicios.</h2>
      <div class="servicios">
        <div class="servicio1">
          <img src="img/peine.png" alt="tijera y peine" />
          <ul>
            <li><i class="fas fa-circle"></i> Alisados.</li>
            <li><i class="fas fa-circle"></i> Peinado.</li>
            <li><i class="fas fa-circle"></i> Cortes.</li>
            <li><i class="fas fa-circle"></i> Tintes.</li>
          </ul>
        </div>
        <div class="servicio2">
          <img src="img/maquillaje.png" alt="maquillaje" />
          <ul>
            <li><i class="fas fa-circle"></i> Maquillaje.</li>
            <li><i class="fas fa-circle"></i> Barbería.</li>
            <li><i class="fas fa-circle"></i> Maquillaje para Novias.</li>
            <li><i class="fas fa-circle"></i> Planchado.</li>
          </ul>
        </div>
        <div class="servicio3">
          <img src="img/esmalte-de-unas.png" alt="uñas" />
          <ul>
            <li><i class="fas fa-circle"></i> Manicure.</li>
            <li><i class="fas fa-circle"></i> Pedicure.</li>
            <li><i class="fas fa-circle"></i> Masajes. para Novias.</li>
            <li><i class="fas fa-circle"></i> Exfoliante.</li>
            <li><i class="fas fa-circle"></i> Limpieza de rostro.</li>
          </ul>
        </div>
      </div>
    </div>
    <!--Promociones-->
    <div class="promos">
      <div class="promo">
        <div class="promo-hijo one">
          <h3>Corte + Peinado</h3>
          <p>$13.50</p>
        </div>
      </div>
      <div class="promo">
        <div class="promo-hijo two">
          <h3>Corte + Peinado</h3>
          <p>$13.50</p>
        </div>
      </div>
      <div class="promo">
        <div class="promo-hijo three">
          <h3>Corte + Peinado</h3>
          <p>$13.50</p>
        </div>
      </div>
    </div>
    @endsection
    <!--Nuestros servicios-->

