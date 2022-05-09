<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('css/cita.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    @section('title', 'Cita')
</head>

<body>
    @extends('Navbar')
    @section('navbar')
        <div class="container mt-5 mb-5">
            <h1>Haz tu Cita.</h1>
            @if (session('existe'))
                <div class="alert alert-warning">
                    <strong>{{ session('existe') }}</strong>
                </div>
            @endif
            <form action="{{ route('guardar.cita') }}" method="POST" class="border rounded p-3">
                @csrf
                @if ($errors->has('Fecha'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('Fecha') }}</strong>
                    </div>
                @endif
                @if ($errors->has('Hora'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('Hora') }}</strong>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif
                <div class="d-md-flex">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" id="fecha" name="Fecha" placeholder="Ingresa Fecha.." class="form-control"
                                required />
                        </div>
                        @php
                            
                        @endphp
                        <div class="form-group">
                            <label for="sel1">Selecciona un horario</label>
                            <select class="form-control" id="horario" name="Hora" required>
                                <option value="">Elige un horario.</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="servicio">Servicio (max 3)</label>
                            <ul class="list-group cita-container">
                                @foreach ($servicios as $servicio)
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="Servicios[]" value="{{ $servicio->Nombre }}"
                                                    class="form-check-input">{{ $servicio->Nombre }}
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="form-group">
                            <label for="mesaje">Mensaje</label>
                            <textarea class="form-control" rows="5" id="mesaje" name="Mensaje" placeholder="Describe tu cita aqui..."></textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary mt-2">Agendar</button>
                </div>
            </form>
        </div>
    @endsection
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery("#fecha").change(function(e) {
                e.preventDefault();
                var fecha = $('#fecha').val();
                var hoy = new Date();
                let fecha_aux = new Date(`${fecha}`);
                let fecha1 = sumarDia(fecha_aux);
                hoy.setHours(0, 0, 0, 0);

                function sumarDia(fecha) {
                    fecha.setDate(fecha.getDate() + 1);
                    return fecha;
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                if (hoy <= fecha1 || hoy == fecha1) {
                    $.ajax({
                        url: "{{ route('llenar.horario') }}",
                        type: "POST",
                        data: {
                            fecha: fecha,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#horario').html(response);
                        }
                    });
                } else {
                    alert('Fecha del Pasado');
                    $('#fecha').val("");
                    $('#horario').html(`<option value="">Elige un horario.</option>`);
                }

            });

        });
    </script>
</body>


</html>
