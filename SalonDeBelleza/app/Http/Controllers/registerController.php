<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ],
            [
                'name' => 'El campo no puede estar vacio.',
                'email.unique' => 'El correo ya esta tomado.',
                'email.required' => 'El campo no puede estar vacio.',
                'email.email' => 'Debe ser un email valido.',
                'password.required' => 'El campo no puede estar vacio.',
                'password.min' => 'Debe tener al menos 6 caracteres.',
            ]);
        $data = $request->all();
        $check = $this->create($data);

        return redirect()->route('mostrar.registrarse')->with('success', 'Has sido registrado correctamente');
    }
    public function create(array $data)
    {
        //
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:6',
        ], [
            'name' => 'El campo no puede estar vacio.',
            'password.required' => 'El campo no puede estar vacio',
            'password.min' => 'Debe tener al menos 6 caracteres',
        ]);
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('mostrar.home');
        }

        return redirect()->route('mostrar.inicio')->with('error', 'Error al loguearse.');
    }
    public function cerrarSesion()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('mostrar.home');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
