<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UploadImageController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/catalogue', [App\Http\Controllers\CatalogueController::class, 'see'])->name('see_catalogue');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'add'])->name('admin_add');
Route::post('/store', [App\Http\Controllers\AdminController::class, 'create'])->name('admin_create');
Route::get('/upload-image', [App\Http\Controllers\UploadImageController::class, 'index']);
Route::post('/save', [App\Http\Controllers\UploadImageController::class, 'save']);
Route::post('/detail', [App\Http\Controllers\CatalogueController::class, 'select'])->name('selet_catalogue');
Route::get('/basket', [App\Http\Controllers\BasketController::class, 'see'])->name('see_basket');
Route::post('/add', [App\Http\Controllers\BasketController::class, 'add'])->name('add_product_basket');
Route::post('/change', [App\Http\Controllers\UpdateController::class, 'change'])->name('change_product_basket');
Route::post('/facture', [App\Http\Controllers\FactureController::class, 'create'])->name('create_facture');
Route::post('/stock', [App\Http\Controllers\AdminController::class, 'change'])->name('change_stock');
Route::get('/role', [App\Http\Controllers\AdminController::class, 'admin'])->name('change_role');
Route::post('/select', [App\Http\Controllers\BasketController::class, 'select'])->name('basket_select');
Route::get('/show', [App\Http\Controllers\FactureController::class, 'show'])->name('show_facture');
