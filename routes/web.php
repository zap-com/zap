<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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



Auth::routes();
//Public Routes
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/category/{category}', [PublicController::class, 'category'])->name('category.index');
Route::get('/announcement/catjson', [AnnouncementController::class, 'catjson'])->name('category.json');
Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement.index');
Route::get('/announcement/json', [AnnouncementController::class, 'json'])->name('announcement.json');
Route::get('/announcement/{announcement}', [AnnouncementController::class, 'show'])->name('announcement.show');

Route::get('/revisor', [RevisorController::class, 'index']);

Route::middleware(['auth'])->group(function () {

    Route::get('/ad/create', [AnnouncementController::class, 'create'])->name('announcement.create');

    Route::post('/announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');

    Route::get('/announcement/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('announcement.edit');

    Route::put('/announcement/{announcement}/update', [AnnouncementController::class, 'update'])->name('announcement.update');

    Route::delete('/announcement/{announcement}/delete', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');
});
