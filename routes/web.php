<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\pembayaranController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Models\Kategori;
use App\Models\Laporan;
use App\Models\Menu;
use App\Models\Pembayaran;

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

// Route::get('/', function () {
//     return view('welcome');
// })->middleware('auth');

// Route::get('/admin', function () {
//     return view('layouts.backend');
// })->middleware('auth');
    
Auth::routes(
    
);

Route::group(['prefix' => 'admin' , 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('dashboard');
    
    Route::resource('kategori', KategoriController::class);

    Route::resource('menu', MenuController::class);

    Route::resource('pembayaran', pembayaranController::class);
});

Route::resource('user', UserController::class);

Route::get('/',[FrontendController::class,'menampilkan'])-> middleware('auth');

Route::get('data', function () {
    return view('data')->name('data');
});
Route::get('/show-modal/{id}', 'App\Http\Controllers\FrontendController@showModal');

Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');






Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');       