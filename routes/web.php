<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DudiController;
use App\Http\Controllers\MouController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dudi', [DudiController::class, 'index'])->name('dudi.index');
    Route::post('/dudi/store', [DudiController::class, 'store'])->name('dudi.store');
    Route::get('/dudi/create', [DudiController::class, 'create'])->name('dudi.create');
    Route::put('/dudi/{dudi}', [DudiController::class, 'update'])->name('dudi.update');
    Route::delete('/dudi/{dudi}', [DudiController::class, 'destroy'])->name('dudi.destroy');
    Route::put('/dudi/update-status/{dudi}', [DudiController::class, 'updateStatus'])->name('dudi.validate');

    Route::get('/mou', [MouController::class, 'index'])->name('mou.index');
    Route::post('/mou/store', [MouController::class, 'store'])->name('mou.store');
    Route::put('/mou/{mou}', [MouController::class, 'update'])->name('mou.update');
    Route::delete('/mou/{mou}', [MouController::class, 'destroy'])->name('mou.destroy');
});
