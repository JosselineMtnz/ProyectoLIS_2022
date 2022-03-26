<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/login.css" />
    <title>Login</title>
  </head>
  <body>
    <!--Login-->
    <div class="container">
      <div class="box signin">
        <h2 class="h2-box">¿No tienes una cuenta?</h2>
        <a href="{{route('mostrar.registrarse')}}" class="btn-register"><p>Registrarse</p></a>
      </div>

      <div class="container-form">
        <form action="{{route('custom.login')}}" method="POST" class="form inicio">
          @csrf
          @if (session('error'))
          <h6 class="error" >{{session('error')}}</h6>
          @endif
          <h2 class="form-title">Iniciar Sesión</h2>
          <div class="input-group">
            <a href="{{route('inicio.google')}}" class="google">
              <img src="img/google_icon.png" alt="Icono" />
              Iniciar con Google.
            </a>
          </div>
          <div class="espaciado">
            <div class="line"></div>
            <span class="text">O</span>
            <div class="line"></div>
          </div>
         <div class="input-group">
          <input
          type="text"
          placeholder=" Usuario"
          name="name"
          class="input"
        />
        @if ($errors->has('name'))
        <small class="error" >{{$errors->first('name')}}</small>
        @endif
         </div>
          <div class="input-group">
            <input
            type="password"
            placeholder=" Password"
            name="password"
            class="input"
               />
             @if ($errors->has('password'))
             <small class="error" >{{$errors->first('password')}}</small>
             @endif
          </div>
          <div class="check">
            <input type="checkbox" name="accept" id="" /><label for="accept">
              Remember me.
            </label>
          </div>
          <br />
          <input type="submit" value="Iniciar Sesión" class="submit" />
        </form>
      </div>
    </div>
    <script
      src="https://kit.fontawesome.com/62ea397d3a.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
