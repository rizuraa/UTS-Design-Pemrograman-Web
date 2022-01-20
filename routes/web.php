<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;

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
    return view('home');
});

Route::get('/login', function () {
    return view('dashboard/auth/login');
})->name('login');

Route::post('/login', [AuthController::class,'authenticate']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard/dashboard');
    });

    Route::get('/beranda', function () {
        return view('dashboard/layout/beranda');
    });

    Route::get('/sorotan', function () {
        return view('dashboard/layout/sorotan');
    });

    Route::get('/product', function () {
        return view('dashboard/layout/product');
    });

    Route::get('/testimoni', function () {
        return view('dashboard/layout/testimoni');
    });

    Route::get('/kontak', function () {
        return view('dashboard/layout/kontak');
    });

    //kontak route
    Route::post('/kontak', [KontakController::class, 'simpan']);

    //Home Kontroller
    Route::post('/home', [HomeController::class, 'simpan']);
    Route::get('/home-hapus/{id}', [HomeController::class, 'hapus']);
    Route::get('/home-get/{id}', [HomeController::class, 'getId']);
    Route::put('/home-update/{id}', [HomeController::class, 'update'])->name('home.update');
    
    //about route
    Route::post('/about', [AboutController::class, 'simpan']);
    Route::get('/about-hapus/{id}', [AboutController::class, 'hapus']);
    Route::get('/about-get/{id}', [AboutController::class, 'getId']);
    Route::put('/about-update/{id}', [AboutController::class, 'update'])->name('about.update');

    Route::get('/admin', function () {
        return view('dashboard/layout/admin');
    });

    Route::get('/galery', function () {
        return view('dashboard/layout/galery');
    });

    Route::post('/galery', [GaleryController::class, 'simpan']);

    Route::get('/galery-hapus/{id}', [GaleryController::class, 'hapus']);

    Route::get('/logout', [AuthController::class, 'logout']);
});



