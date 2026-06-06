<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UnresourceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\TransactionController;

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

Route::resource('photos', PhotoController::class);
Route::resource('unresources', UnresourceController::class);

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/welcome', function () {
    return "Selamat Datang di Portal Kesehatan";
});

Route::resource('home', HomeController::class);
Route::resource('services', ServiceController::class);
Route::resource('categories', CategoryController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('transactions', TransactionController::class);
Route::resource('articles', ArticleController::class);

Route::post("/category/showInfo", [CategoryController::class, 'showInfo'])->name("category.showInfo");
Route::post('/category/getEditForm', [CategoryController::class, 'getEditForm'])
    ->name('category.getEditForm');
Route::post('/ajax/category/getEditFormB', [CategoryController::class, 'getEditFormB'])
    ->name('category.getEditFormB');

Route::post('/ajax/category/saveDataUpdate', [CategoryController::class, 'saveDataUpdate'])
    ->name('category.saveDataUpdate');
Route::post('/ajax/category/deleteData', [CategoryController::class, 'deleteData'])
    ->name('category.deleteData');
Route::post('/ajax/service/getEditForm', [ServiceController::class, 'getEditForm'])
    ->name('services.getEditForm');

// doctor
Route::post('/ajax/doctor/getEditForm', [DoctorController::class, 'getEditForm'])->name('doctor.getEditForm');
Route::post('/ajax/doctor/deleteData', [DoctorController::class, 'deleteData'])
    ->name('doctor.deleteData');


Route::post('/ajax/transaction/getEditForm', [TransactionController::class, 'getEditForm'])->name('transaction.getEditForm');
Route::post('/ajax/article/getEditForm', [ArticleController::class, 'getEditForm'])->name('article.getEditForm');
Route::post('/ajax/article/deleteData', [ArticleController::class, 'deleteData'])->name('article.deleteData');
// Route::resource('/home', HomeController::class);
// Route::resource('/home', HomeController::class);

// Route::get('/menu/{menu}', function($menu){
//     if($menu=="konsultasi"){
//         return view('konsultasi');
//     }
//     else if($menu=="janji"){
//         return view('janji');
//     }
//     else{
//         return "Halaman tidak ditemukan";
//     }
// })->name('menu.page');

// Route::get('/admin/{admincat}', function($admincat){
//     if($admincat=="categories"){
//         return "Portal Manajemen: Daftar Kategori Layanan";
//     }
//     else if($admincat=="order"){
//         return "Portal Manajemen: Daftar Konsultasi dan Janji Temu";
//     }
//     else if($admincat=="members"){
//         return "Portal Manajemen: Daftar Pasien";
//     }
//     else{
//         return "Halaman tidak ditemukan";
//     }
    
// })->name('admin.page');

// Route::get('/index2',function(){
//     return view('index2');
// });


// Route::get('/photos', PhotoController::class, 'store');



// Route::get('/login', [UserController::class, 'load'])->name('login');
