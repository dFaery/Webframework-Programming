<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UnresourceController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/welcome', function(){
    return "Selamat Datang di Portal Kesehatan";
});

Route::get('/menu', function(){
    return view('menu');
})->name('menu');

Route::get('/menu/{menu}', function($menu){
    if($menu=="konsultasi"){
        return view('konsultasi');
    }
    else if($menu=="janji"){
        return view('janji');
    }
    else{
        return "Halaman tidak ditemukan";
    }
})->name('menu.page');

Route::get('/admin/{admincat}', function($admincat){
    if($admincat=="categories"){
        return "Portal Manajemen: Daftar Kategori Layanan";
    }
    else if($admincat=="order"){
        return "Portal Manajemen: Daftar Konsultasi dan Janji Temu";
    }
    else if($admincat=="members"){
        return "Portal Manajemen: Daftar Pasien";
    }
    else{
        return "Halaman tidak ditemukan";
    }
    
})->name('admin.page');

Route::resource('photos', PhotoController::class);
Route::resource('services', ServiceController::class);
Route::resource('categories', CategoryController::class);
Route::resource('unresources', UnresourceController::class);



// Route::get('/login', [UserController::class, 'load'])->name('login');
