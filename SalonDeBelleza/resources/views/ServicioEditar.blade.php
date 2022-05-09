@extends('Navbar')
@section('header')
    <link rel="stylesheet" href="{{ asset('css/servicioad.css') }}">
@endsection
@section('title', 'Administrar Servicios update')

@section('navbar')
    <div class="container mt-5 mb-5">
        <h1>Administrar servicios</h1>
        @if (session('success'))
            <div class="alert alert-success">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        <form action="{{ route('servicio.update', ['id' => $servicios->id]) }}" method="post">
            @method('PATCH')
            @csrf
            <div class="d-md-flex">
                <div class="col-md-8 border rounded p-3">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="Nombre" placeholder="Nombre del servicio." class="form-control"
                            value="{{ $servicios->Nombre }}" />
                        @if ($errors->has('Nombre'))
                            <small style="color: red">{{ $errors->first('Nombre') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="duracion">Hora</label>
                        <input type="text" name="Duracion" placeholder="Duración del servicio (en horas)."
                            class="form-control" value="{{ $servicios->Duracion }}" />
                        @if ($errors->has('Duracion'))
                            <small style="color: red">{{ $errors->first('Duracion') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" rows="5" name="Descripcion"
                            placeholder="Descripción del servicio.">{{ $servicios->Descripcion }}</textarea>
                        @if ($errors->has('Descripcion'))
                            <small style="color: red">{{ $errors->first('Descripcion') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success mt-2">Actualizar</button>
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
                @foreach ($servi as $serv)
                    <li class="list-group-item d-flex justify-content-between">{{ $serv->Nombre }}
                        <div class="d-flex">
                            <a href="{{ route('servicio.editar', [$serv->id]) }}"
                                class="btn btn-primary btn-sm mr-1">Editar</a>
                            <form action="{{ route('servicio.eliminar', [$serv->id]) }}" method="POST">
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
