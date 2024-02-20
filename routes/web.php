<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KanyeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LOginController;

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
    return redirect()->route('login');
});

Route::get('/login',[LOginController::class,'login'])->name('login');
Route::get('/registration',[LOginController::class,'registration'])->name('registration');
Route::post('/reister-user', [LOginController::class,'registerUser'])->name('register-user');
Route::post('/login-user', [LOginController::class,'loginUser'])->name('login-user');
Route::get('/dashboard', [LOginController::class,'dashboard'])->middleware('isLoggedIn')->name('dashboard');
Route::get('/logout', [LOginController::class,'logout'])->name('logout');

