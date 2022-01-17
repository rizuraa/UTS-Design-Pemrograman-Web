<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GaleryController;

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
});

Route::post('/login', [AuthController::class,'authenticate']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard/dashboard');
    });

    Route::post('/galery', [GaleryController::class, 'simpan']);

    Route::get('/galery-hapus/{id}', [GaleryController::class, 'hapus']);



    Route::get('/beranda', function () {
        return view('dashboard/layout/beranda');
    });

    Route::get('/sorotan', function () {
        return view('dashboard/layout/sorotan');
    });

    Route::get('/product', function () {
        return view('dashboard/layout/product');
    });

    Route::get('/galery', function () {
        return view('dashboard/layout/galery');
    });

    Route::get('/testimoni', function () {
        return view('dashboard/layout/testimoni');
    });

    Route::get('/kontak', function () {
        return view('dashboard/layout/kontak');
    });

    Route::get('/admin', function () {
        return view('dashboard/layout/admin');
    });

    // Form Routes

    Route::get('/edit-beranda', function () {
        return view('dashboard/form/beranda');
    });

    Route::get('/edit-sorotan', function () {
        return view('dashboard/form/sorotan');
    });

    Route::get('/edit-product', function () {
        return view('dashboard/form/product');
    });

    Route::get('/edit-galery', function () {
        return view('dashboard/form/galery');
    });

    Route::get('/edit-testimoni', function () {
        return view('dashboard/form/testimoni');
    });

    Route::get('/edit-kontak', function () {
        return view('dashboard/form/kontak');
    });

    Route::get('/edit-admin', function () {
        return view('dashboard/form/admin');
    });
});



