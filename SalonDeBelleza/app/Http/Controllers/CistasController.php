<?php

namespace App\Http\Controllers;

use App\Models\citas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class CistasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $citas1 = citas::all();

        foreach ($citas1 as $cita) {
            if ((!(date('Y-m-d') <= $cita->Fecha)) && $cita->Estado !== 'Hecho') {

                self::estado($cita->id);
            }
        }
        $citas = citas::orderBy('Fecha')->get();
        return view('citasProgramadas', ['citas' => $citas]);
    }
    public function estado($id)
    {
        $cita = citas::find($id);
        $cita->Estado = 'Pasado';
        $cita->save();
        return $cita;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Fecha' => 'required',
            'Hora' => 'required',
        ],
            [
                'Fecha.required' => 'La Fecha es requerida',
                'Hora' => 'La hora es requerida',
            ]);
        $input = $request->input('Servicios');
        if (citas::where('Fecha', $request->Fecha)->exists() && citas::where('Hora', $request->Hora)->exists()) {
            return redirect()->route('mostrar.cita')->with('existe', 'Disculpe el incoveniente pero esa hora no esta disponible');
        } else {
            if (count($input) > 3) {
                return redirect()->route('mostrar.cita')->with('error', 'Solo se puede agendar un maximo de 3 servicios.');
            } elseif (self::saber_dia($request->Fecha) == 'Domingo') {
                return redirect()->route('mostrar.cita')->with('error', 'Disculpe el incoveniente nuestros horarios de servicios son de Lunes a Sábado');
            } else {
                $cita = new citas;
                $cita->Fecha = $request->Fecha;
                $cita->Hora = $request->Hora;
                $cita->Servicios = json_encode($input);
                $cita->Mensaje = $request->Mensaje;
                $cita->Estado = 'Activo';
                $cita->user_id = $request->user_id;
                $cita->save();
                return redirect()->route('mostrar.cita')->with('success', 'Cita agendada exitosamente');
            }
        }
    }
    public function saber_dia($nombredia)
    {
        $dias = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
        $fecha = $dias[date('N', strtotime($nombredia)) - 1];
        return $fecha;
    }

    public function AdministrarEstado($id)
    {
        $cita = citas::find($id);
        if ($cita->Estado == 'Pasado' || $cita->Estado == 'Activo') {
            $cita->Estado = 'Hecho';
        }
        $cita->save();
        return redirect()->route('mostrar.adcitas')->with('success', 'Estado Actualizado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if ($request->ajax()) {
            session_start();
            $fecha = $request->fecha;
            $resultado = self::saber_dia($fecha);
            $html = [];
            $horario = array('08:00-10:00', '10:00-12:00', '12:00-14:00', '14:00-16:00', '16:00-18:00');
            $result = DB::select('Select Hora from citas where Fecha = ?', [$fecha]);
            $cadena = "";
            if ($resultado != 'Domingo') {
                foreach ($result as $resul) {
                    $html[] = $resul->Hora;
                }
                $nuevo = array_diff($horario, $html);

                foreach ($nuevo as $new) {
                    $cadena = $cadena . '<option value=' . $new . '>' . $new . '</option>';
                }
            } else {
                $cadena = '<option value="">No hay horarios disponibles</option>';
            }
            return $cadena;
        }
        //Llenar el select con horarios

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = citas::find($id);
        $cita->delete();

        return redirect()->route('mostrar.adcitas')->with('success', 'Elimada Correctamente');
    }
}
