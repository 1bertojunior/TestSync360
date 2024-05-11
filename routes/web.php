<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

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
   return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('user/address', [AddressController::class, 'getUserAddress']);
Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
Route::post('/addresses/put', [AddressController::class, 'update'])->name('addresses.update');
