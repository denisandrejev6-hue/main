<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasakumuController;
use App\Http\Controllers\TelpasController;
use App\Http\Controllers\LietotajuController;
use App\Http\Controllers\RezervesKopijuController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategorijuController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    // sākumlapā arī rādam pasākumu sarakstu, lai lietotāji varētu tos pārvaldīt
    $items = \App\Models\Pasakumi::orderBy('ID', 'asc')->get();
    return view('Home', ['data' => $items]);
})->middleware('auth');

// resursa maršruti pasākumiem (līdzīgi vecajai DataController funkcionalitātei)
Route::resource('pasakumi', PasakumuController::class)->middleware(['auth', 'role:Admin,Darbinieks,Lietotajs']);

// papildu resursi citām tabulām
Route::resource('telpas', TelpasController::class)->middleware(['auth', 'role:Admin,Darbinieks,Lietotajs']);
Route::resource('lietotaji', LietotajuController::class)->middleware(['auth', 'role:Admin,Darbinieks']);
Route::resource('rezerveskopijas', RezervesKopijuController::class)->middleware(['auth', 'role:Admin,Darbinieks']);
Route::resource('kategorijas', KategorijuController::class)->middleware(['auth', 'role:Admin,Darbinieks']);