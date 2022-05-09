<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/citasProgramadas.css">
    @section('title', 'Usuarios')
</head>

<body>
    @extends('Navbar')
    @section('navbar')
        <div class="container mt-5 mb-5 contenedor">
            <h1>Usuarios</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Fecha de creación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    @endsection

</body>

</html>
