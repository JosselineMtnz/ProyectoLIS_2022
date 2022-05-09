<?php

namespace App\Http\Controllers;

use App\Models\servicios;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    //

    public function index()
    {
        $servicios = servicios::all();
        return view('Servicio', ['servicios' => $servicios]);
    }
    public function guardar(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|min:3',
        ], [
            'Nombre.required' => 'El campo no puede estar vacio.',
            'Nombre.min' => 'El nombre tiene que tener al menos 3 caracteres.',
        ]);
        $servicio = new servicios;
        $servicio->Nombre = $request->Nombre;
        $servicio->Descripcion = $request->Descripcion;
        $servicio->save();
        return redirect()->route('mostrar.adservicio')->with('success', 'Guardado exitosamente!');
    }
    public function show($id)
    {
        $servicios = servicios::find($id);
        $servi = servicios::all();
        return view('ServicioEditar', ['servicios' => $servicios, 'servi' => $servi]);
    }
    public function editar(Request $request, $id)
    {
        $servicio = servicios::find($id);
        $servicio->Nombre = $request->Nombre;
        $servicio->Descripcion = $request->Descripcion;
        $servicio->save();

        return redirect()->route('mostrar.adservicio')->with('editarExito', 'Publicación actualizada');

    }
    public function eliminar($id)
    {
        $servicio = servicios::find($id);
        $servicio->delete();

        return redirect()->route('mostrar.adservicio')->with('eliminarExito', 'Servicio eliminado');
    }
}
