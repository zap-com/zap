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
Route::get('/test', [AnnouncementController::class, 'test'])->name('test');


//Work

Route::prefix('work')->group(function(){
    Route::get('/revisor', [PublicController::class, 'works'])->name('works');
    Route::post('/revisor/send/{user}', [PublicController::class, 'revisorWork'])->name('work.revisor');
   

});



Route::middleware(['auth'])->group(function () {

    Route::get('/ad/create', [AnnouncementController::class, 'create'])->name('announcement.create');

    Route::post('/announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');

    Route::get('/announcement/edit/{announcement}', [AnnouncementController::class, 'edit'])->name('announcement.edit');

    Route::put('/announcement/update/{announcement}', [AnnouncementController::class, 'update'])->name('announcement.update');

    Route::delete('/announcement/delete/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');
});


Route::prefix('revisor')->group(function(){
    Route::get('/dashboard', [RevisorController::class, 'index'])->name('revisor.home');
    Route::post('/dashboard/{announcement}/accepte', [RevisorController::class, 'setAccepted'])->name('revisor.accept');
    Route::post('/dashboard/{announcement}/reject', [RevisorController::class, 'setRejected'])->name('revisor.reject');

});