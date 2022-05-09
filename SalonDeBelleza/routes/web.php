<?php

use App\Http\Controllers\CistasController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\ServiciosController;
use App\Models\servicios;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {return view('Login');})->name('mostrar.inicio');
Route::get('/register', function () {return view('Register');})->name('mostrar.registrarse');
Route::get('/home', function () {return view('Home');})->name('mostrar.home');
Route::get('/servicios', function () {return view('Servicios');})->name('mostrar.servicios');
Route::get('/cita', function () {$servicios = servicios::all();return view('Cita', ['servicios' => $servicios]);})->name('mostrar.cita');
Route::get('/administrarServicio', [ServiciosController::class, 'index'])->name('mostrar.adservicio');
Route::get('/citasprogramadas', [CistasController::class, 'index'])->name('mostrar.adcitas');
Route::get('/signout', [registerController::class, 'cerrarSesion'])->name('cerrarSesion');

Route::post('/', [registerController::class, 'customRegistration'])->name('register.custom');
Route::post('/home', [registerController::class, 'customLogin'])->name('custom.login');
/*Administar Servicios*/
Route::post('/administrarServicio', [ServiciosController::class, 'guardar'])->name('guardar.servicio');
Route::get('/administrarServicioupdate/{id}', [ServiciosController::class, 'show'])->name('servicio.editar');
Route::patch('/administrarServicio/{id}', [ServiciosController::class, 'editar'])->name('servicio.update');
Route::delete('/administrarServicio/{id}', [ServiciosController::class, 'eliminar'])->name('servicio.eliminar');
/*Administrar citas*/

Route::post('/cita', [CistasController::class, 'store'])->name('guardar.cita');
Route::post('/cita/request', [CistasController::class, 'show'])->name('llenar.horario');
Route::delete('/cita/{id}', [CistasController::class, 'destroy'])->name('eliminar.cita');
Route::patch('/cita/state/{id}', [CistasController::class, 'AdministrarEstado'])->name('estado.update');
/*Usuarios*/
Route::get('/usuarios', [registerController::class, 'index'])->name('mostrar.usuarios');

/*Inicio y Registrarse con GOOGLE */
Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
})->name('inicio.google');

Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();

    $userExist = User::where('external_id', $user->id)->where('external_auth', 'google')->first();
    if ($userExist) {
        Auth::login($userExist);
        return redirect()->route('mostrar.home');
    } else {
        $userNew = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'external_id' => $user->id,
            'external_auth' => 'google',
        ]);
        Auth::login($userNew);
        return redirect()->route('mostrar.home');
    }

});
