<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryManagementController;
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

/* Frontend gallery proxy app routes */
Route::get('/client-gallery', [
    GalleryController::class,
    'index',
]);

Route::post('/client-gallery', [
    GalleryController::class,
    'store',
])->middleware(['cors']);

Route::get('/client-gallery/{make}', [
    GalleryController::class,
    'index',
]);

Route::get('/client-gallery/{make}/{model}', [
    GalleryController::class,
    'index',
]);

Route::get('/client-gallery/{make}/{model}/{year}', [
    GalleryController::class,
    'index',
]);

/* Gallery admin app routes */
Route::middleware(['verify.shopify'])->group(function () {

    Route::get('/gallery-admin', [
        GalleryManagementController::class,
        'index',
    ])->name('home');

    Route::get('/gallery-admin/approve', [
        GalleryManagementController::class,
        'index',
    ])->name('approve');

    Route::get('/gallery-admin/{submissionId}/edit', [
        GalleryManagementController::class,
        'edit',
    ]);
});

Route::put('/gallery-admin/submission/{submissionId}', [
    GalleryManagementController::class,
    'update',
]);

Route::delete('/gallery-admin/image/{imageId}', [
    GalleryManagementController::class,
    'deleteImage',
]);

Route::patch('/gallery-admin/image/{imageId}/approval', [
    GalleryManagementController::class,
    'updateApproval',
]);
