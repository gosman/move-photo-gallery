<?php

use App\Http\Controllers\ClientGalleryController;
use App\Http\Controllers\ShopifyHomeController;
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

Route::get('/client-gallery', [
    ClientGalleryController::class,
    'index',
]);

Route::post('/client-gallery', [
    ClientGalleryController::class,
    'store',
])->middleware(['verify.shopify']);

Route::get('/client-gallery/{make}', [
    ClientGalleryController::class,
    'index',
]);

Route::get('/client-gallery/{make}/{model}', [
    ClientGalleryController::class,
    'index',
]);

Route::get('/client-gallery/{make}/{model}/{year}', [
    ClientGalleryController::class,
    'index',
]);

Route::get('gallery-app', [
    ShopifyHomeController::class,
    'index',
])->middleware(['verify.shopify'])->name('home');
