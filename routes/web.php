<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('packs');
});

# Para iniciar sesión:
Route::get('login', ['App\Http\Controllers\LoginController', 'getLogin'])->name('login.getLogin');
Route::post('login', ['App\Http\Controllers\LoginController', 'login'])->name('login.login');

# Para cerrar sesión
Route::get('logout', ['App\Http\Controllers\LoginController', 'logout'])->name('login.logout');

# Para el registro:
Route::get('register', ['App\Http\Controllers\LoginController', 'getRegister'])->name('login.getRegister');
Route::post('register', ['App\Http\Controllers\LoginController', 'register'])->name('login.register');

# Para verificar la disponibilidad:
Route::post('verify', ['App\Http\Controllers\LoginController', 'verifyEmailAvailability'])->name('login.verifyEmailAvailability');

Route::get('packs', ['App\Http\Controllers\PackController', 'index']);
Route::get('packs/create', ['App\Http\Controllers\PackController', 'create'])->name('packs.create');
Route::post('packs/store', ['App\Http\Controllers\PackController', 'store'])->name('packs.store');
Route::get('packs/{pack}', ['App\Http\Controllers\PackController', 'show']);
Route::get('packs/{pack}/enable', ['App\Http\Controllers\PackController', 'enable']);

Route::get('events', ['App\Http\Controllers\EventController', 'index'])->name('events.index');
Route::get('events/create/{id}', ['App\Http\Controllers\EventController', 'create'])->name('events.create');
Route::post('events/store', ['App\Http\Controllers\EventController', 'store'])->name('events.store');
Route::get('events/{event}', ['App\Http\Controllers\EventController', 'show']);
Route::get('events/{event}/edit', ['App\Http\Controllers\EventController', 'edit']);
Route::put('events/{event}', ['App\Http\Controllers\EventController', 'update']);
Route::delete('events/{event}', ['App\Http\Controllers\EventController', 'destroy']);

Route::get('users', ['App\Http\Controllers\UserController', 'index']);
Route::get('users/create', ['App\Http\Controllers\UserController', 'create'])->name('users.create');
Route::post('users/store', ['App\Http\Controllers\UserController', 'store'])->name('users.store');
Route::get('users/{user}/edit', ['App\Http\Controllers\UserController', 'edit'])->name('users.edit');
Route::put('users/{user}', ['App\Http\Controllers\UserController', 'update'])->name('users.update');

Route::get('payments', ['App\Http\Controllers\PaymentController', 'index']);
Route::post('payments', ['App\Http\Controllers\PaymentController', 'store']);
Route::get('payments/{payment}/confirm', ['App\Http\Controllers\PaymentController', 'confirm']);

Route::post('expenses', ['App\Http\Controllers\ExpenseController', 'store']);

Route::post('photos', ['App\Http\Controllers\PhotoController', 'store']);
Route::delete('photos/{photo}', ['App\Http\Controllers\PhotoController', 'destroy']);