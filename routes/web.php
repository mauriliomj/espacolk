<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/submit', [ClientController::class, 'store'])->name('submit');

Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/newclient', function () {return 'New client route';})->name('newclient');

Route::get('/newclient', [ClientController::class, 'create'])->name('newclient');
Route::get('/getallclients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/getclientbyname', [ClientController::class, 'searchByName'])->name('clients.search');
Route::delete('/client/{client}', [ClientController::class, 'delete'])->name('clients.delete');
Route::get('/client/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::get('/client/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');

require __DIR__.'/auth.php';
