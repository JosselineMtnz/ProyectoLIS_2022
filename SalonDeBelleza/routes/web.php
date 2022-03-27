<?php

use App\Http\Controllers\registerController;
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
Route::get('/cita', function () {return view('Cita');})->name('mostrar.cita');
Route::get('/signout', [registerController::class, 'cerrarSesion'])->name('cerrarSesion');

Route::post('/', [registerController::class, 'customRegistration'])->name('register.custom');
Route::post('/home', [registerController::class, 'customLogin'])->name('custom.login');

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
