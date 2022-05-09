<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/Navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
    @yield('header')
    <title>@yield('title')</title>
</head>

<body>
    <!--Navegacion y Sidebar-->

    <nav>
        <div class="logo">
            <img src="{{ asset('img/logo.jpeg') }}" alt="Evimini" class="img-logo" />
        </div>
        <div class="control">
            <div class="sidebar">
                <ul>
                    <li>
                        <a href="{{ route('mostrar.home') }}"><i class="fas fa-home"></i> Inicio</a>
                    </li>

                    <li>
                        <a href="{{ route('mostrar.servicios') }}"><i class="fas fa-briefcase"></i> Servicios</a>
                    </li>


                </ul>
                <div class="botones">
                    @if (Auth::check())
                        @if (Auth::user()->role == 'admin')
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle-dark drop"
                                    data-toggle="dropdown">
                                    Bienvenido {{ strtok(Auth::user()->name, ' ') }} <i class="	fas fa-user-alt"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item links"
                                        href="{{ route('mostrar.adservicio') }}">Administrar
                                        Servicios</a>
                                    <a class="dropdown-item links" href="{{ route('mostrar.usuarios') }}">Ver
                                        Usuarios</a>
                                </div>
                            </div>
                            <a href="{{ route('mostrar.adcitas') }}" class="btn-cita">
                                <p>Ver citas</p>
                            </a>
                            <a href="{{ route('cerrarSesion') }}" class="btn-closesesion">
                                <p>Cerrar Sesión</p>
                            </a>
                        @else
                            <h4 class="user">Bienvenido {{ strtok(Auth::user()->name, ' ') }} <i
                                    class="	fas fa-user-alt"></i></h4>
                            <a href="{{ route('mostrar.cita') }}" class="btn-cita">
                                <p>Haz una Cita</p>
                            </a>
                            <a href="{{ route('cerrarSesion') }}" class="btn-closesesion">
                                <p>Cerrar Sesión</p>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('mostrar.inicio') }}" class="btn-sesion">
                            <p>Iniciar Sesión</p>
                        </a>
                        <a href="{{ route('mostrar.inicio') }}" class="btn-cita">
                            <p>Haz una Cita</p>
                        </a>
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
    @yield('navbar')
    <!--Footer-->
    <div class="footer">
        <div class="footer-container">
            <div class="info">
                <div>
                    <a href="https://maps.app.goo.gl/udkhXx2F78GD9BC38" target="_blank" rel="noopener noreferrer"><i
                            class="fas fa-map-marker-alt"></i> Frente a Terminal Sitrams
                        AV.Rosario Sur. Soyapango</a>
                </div>
                <div><i class="fas fa-phone-alt"></i> 6309-1880</div>
                <div><i class="fas fa-envelope"></i> salonevimini@gmail.com</div>
            </div>
            <div class="info-two">
                <div class="nombres">
                    <h4>Desarrolladores:</h4>
                    <h6>Joseseline Esmeralda Martínez Hernández - MH180422</h6>
                    <h6>Xenia Guadalupe Flores Rivas - FR180414</h6>
                    <h6>Jocelyn Susana Aguilar Corvera - AC180847</h6>
                    <h6>Luis Angel Arce Monterroza - AM191922</h6>
                    <h6>Edgar Enrique Milián Rojas - MR180696</h6>
                </div>
                <div class="redes">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/Evimini.Salon" target="_blank"
                                rel="noopener noreferrer"><i class="fab fa-facebook-square"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/evimini_salon/?hl=es-la" target="_blank"
                                rel="noopener noreferrer"><i class="fab fa-instagram-square"></i></a>
                        </li>
                        <li>
                            <a href="https://wa.me/50363091880" target="_blank" rel="noopener noreferrer"><i
                                    class="fab fa-whatsapp-square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <h6 class="derechos">
            Copyright © 2022 Todos los derechos reservados por UDB developer's.
        </h6>
    </div>
    @yield('footer')
    <script src="{{ asset('js/Navbar.js') }}"></script>
    <script src="https://kit.fontawesome.com/62ea397d3a.js" crossorigin="anonymous"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/llenarSelect.js') }}"></script>
</body>

</html>
