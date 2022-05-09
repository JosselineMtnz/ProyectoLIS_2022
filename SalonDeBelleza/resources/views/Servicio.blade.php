@extends('Navbar')
@section('header')
    <link rel="stylesheet" href="css/servicioad.css">
@endsection
@section('title', 'Administrar Servicios')


@section('navbar')
    <div class="container mt-5 mb-5 contenedor">
        <h1>Administrar servicios</h1>
        @if (session('success'))
            <div class="alert alert-success">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        @if (session('editarExito'))
            <div class="alert alert-success">
                <strong>{{ session('editarExito') }}</strong>
            </div>
        @endif
        <form action="{{ route('guardar.servicio') }}" method="post">
            @csrf
            <div class="d-md-flex">
                <div class="col-md-8 border rounded p-3">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="Nombre" placeholder="Nombre del servicio." class="form-control" />
                        @if ($errors->has('Nombre'))
                            <small style="color: red">{{ $errors->first('Nombre') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" rows="5" name="Descripcion" placeholder="Descripción del servicio."></textarea>
                        @if ($errors->has('Descripcion'))
                            <small style="color: red">{{ $errors->first('Descripcion') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger mt-2">Guardar</button>
                    </div>
                </div>
        </form>
        <div class="col-sm-12 col-md-4 my-3 mx-sm-1 mx-md-3 border rounded p-2 service-container">
            @if (session('eliminarExito'))
                <div class="alert alert-success">
                    <strong>{{ session('eliminarExito') }}</strong>
                </div>
            @endif
            <ul class="list-group">
                @foreach ($servicios as $servicio)
                    <li class="list-group-item d-flex justify-content-between">{{ $servicio->Nombre }}
                        <div class="d-flex">
                            <a href="{{ route('servicio.editar', [$servicio->id]) }}"
                                class="btn btn-primary btn-sm mr-1">Editar</a>
                            <form action="{{ route('servicio.eliminar', [$servicio->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-danger btn-sm" value="X">
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


    </div>

@endsection
