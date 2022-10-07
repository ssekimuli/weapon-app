<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});


// Route::get('/add_weapon', [App\Http\Controllers\WeaponController::class, 'add_weapon'])->name('add_weapon');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/cart_Weapon', [App\Http\Controllers\HomeController::class, 'cart_Weapon'])->name('cart_Weapon');
Route::get('/orderWeapon', [App\Http\Controllers\HomeController::class, 'orderWeapon'])->name('orderWeapon');
Route::get('weapon', [App\Http\Controllers\WeaponController::class, 'weapon'])->name('weapon');
Route::post('addWeapon', [App\Http\Controllers\WeaponController::class, 'addWeapon'])->name('addWeapon');
