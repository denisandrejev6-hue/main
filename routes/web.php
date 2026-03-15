<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasakumuController;
use App\Http\Controllers\TelpasController;
use App\Http\Controllers\LietotajuController;
use App\Http\Controllers\RezervesKopijuController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    // on the start page we also show the list of pasakumi so users can manage them
    $items = \App\Models\Pasakumi::orderBy('ID', 'asc')->get();
    return view('Home', ['data' => $items]);
})->middleware('auth');

// resourceful routes for pasakumi (similar to old DataController functionality)
Route::resource('pasakumi', PasakumuController::class)->middleware(['auth', 'role:Admin,Darbinieks,Lietotajs']);
// additional resources for other tables
Route::resource('telpas', TelpasController::class)->middleware(['auth', 'role:Admin,Darbinieks,Lietotajs']);
Route::resource('lietotaji', LietotajuController::class)->middleware(['auth', 'role:Admin,Darbinieks']);
Route::resource('rezerveskopijas', RezervesKopijuController::class)->middleware(['auth', 'role:Admin,Darbinieks']);
