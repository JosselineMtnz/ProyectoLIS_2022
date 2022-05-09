<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="css/citasProgramadas.css">
    @section('title', 'Citas Programadas')
</head>

<body>
    @extends('Navbar')
    @section('navbar')
        <div class="container mt-5 mb-5 contenedor">
            <h1>Citas Programadas</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>Servicios</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas as $cita)
                        @if ($cita->Estado == 'Pasado')
                            <tr style="background-color: #ff6666">
                                <td>{{ $cita->user->name }}</td>
                                <td>{{ $cita->user->email }}</td>
                                <td>{{ str_replace(['[[', '"', ']]'], '', $cita->Servicios) }}</td>
                                <td>{{ $cita->Fecha }}</td>
                                <td>{{ $cita->Hora }}</td>
                                <td><button class="btn btn-warning" disabled="disabled">{{ $cita->Estado }}</button></td>
                                <td>
                                    <div class="d-flex">
                                        <form action="{{ route('eliminar.cita', [$cita->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-danger btn-sm mx-1" value="X">
                                        </form>
                                        <form action="{{ route('estado.update', [$cita->id]) }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <input type="submit" class="btn btn-primary btn-sm mx-1" value="✔">
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @elseif ($cita->Estado == 'Hecho')
                            <tr style="background-color: #66ff66">
                                <td>{{ $cita->user->name }}</td>
                                <td>{{ $cita->user->email }}</td>
                                <td>{{ str_replace(['[[', '"', ']]'], '', $cita->Servicios) }}</td>
                                <td>{{ $cita->Fecha }}</td>
                                <td>{{ $cita->Hora }}</td>
                                <td><button class="btn btn-info" disabled="disabled">{{ $cita->Estado }}</button></td>
                                <td>
                                    <form action="{{ route('eliminar.cita', [$cita->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger btn-sm mx-1" value="X">
                                    </form>
                                </td>

                            </tr>
                        @else
                            <tr>
                                <td>{{ $cita->user->name }}</td>
                                <td>{{ $cita->user->email }}</td>
                                <td>{{ str_replace(['[[', '"', ']]'], '', $cita->Servicios) }}</td>
                                <td>{{ $cita->Fecha }}</td>
                                <td>{{ $cita->Hora }}</td>
                                <td><button class="btn btn-success" disabled="disabled">{{ $cita->Estado }}</button></td>
                                <td>
                                    <div class="d-flex">
                                        <form action="{{ route('eliminar.cita', [$cita->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-danger btn-sm mx-1" value="X">
                                        </form>
                                        <form action="{{ route('estado.update', [$cita->id]) }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <input type="submit" class="btn btn-primary btn-sm mx-1" value="✔">
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
        </div>

    @endsection

</body>

</html>
