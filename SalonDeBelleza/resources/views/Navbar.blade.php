<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/Navbar.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
    @yield('header')
    <title>@yield('title')</title>
</head>
<body>
     <!--Navegacion y Sidebar-->
     
     <nav>
        <div class="logo">
          <img src="img/logo.jpeg" alt="Evimini" class="img-logo" />
        </div>
        <div class="control">
          <div class="sidebar">
            <ul>
              <li>
                <a href="{{route('mostrar.home')}}"><i class="fas fa-home"></i> Inicio</a>
              </li>
              <li>
                <a href="{{route('mostrar.servicios')}}"><i class="fas fa-briefcase"></i> Servicios</a>
              </li>
            </ul>
            <div class="botones">
              @if (Auth::check())
                <h4 class="user">Bienvenido  {{strtok(Auth::user()->name," ")}}  <i class="	fas fa-user-alt"></i></h4>
              @else
              <a href="{{route('mostrar.inicio')}}" class="btn-sesion"><p>Iniciar Sesión</p></a>
              @endif
              <a href="{{route('mostrar.cita')}}" class="btn-cita" ><p>Haz una Cita</p></a>
              @if (Auth::check())
              <a href="{{route('cerrarSesion')}}" class="btn-closesesion"><p>Cerrar Sesión</p></a>
              @endif
            </div>
          </div>
  
          <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
          </div>
        </div>
      </nav> 
      
    <script src="js/Navbar.js"></script>
    <script
      src="https://kit.fontawesome.com/62ea397d3a.js"
      crossorigin="anonymous"
    ></script>
    @yield('navbar')
</body>
</html>