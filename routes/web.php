<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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


//locale

Route::get('/local/{locale}', [PublicController::class, 'locale'])->name('locale');

//carouserl

Route::get('/carosel/{announcement}', [PublicController::class, 'indexCarousel']);




//Search route

Route::get('/test', [PublicController::class, 'search'])->name('search');


//Works

Route::prefix('work')->group(function () {
    Route::get('/revisor', [PublicController::class, 'works'])->name('works');
    Route::post('/revisor/send/{user}', [PublicController::class, 'revisorWork'])->name('work.revisor');

    Route::get('/revisor/accept/{user}', [AdminController::class, 'acceptRevisor'])->name('work.acceptRevisor');
});



Route::middleware(['auth'])->group(function () {

    Route::get('/ad/create', [AnnouncementController::class, 'create'])->name('announcement.create');

    Route::post('/announcement/uploadImages', [AnnouncementController::class, 'uploadImages']);


    Route::delete('/announcement/removeImage', [AnnouncementController::class, 'removeImage']);

    Route::get('/ad/images', [AnnouncementController::class, 'getImages']);

    Route::post('/announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');

    Route::get('/announcement/edit/{announcement}', [AnnouncementController::class, 'edit'])->name('announcement.edit');

    Route::put('/announcement/update/{announcement}', [AnnouncementController::class, 'update'])->name('announcement.update');

    Route::delete('/announcement/delete/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');

    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');

    Route::post('profile/update/{id}', [UserController::class, 'update'])->name('profile.update');
});


Route::prefix('revisor')->group(function () {
    Route::get('/dashboard', [RevisorController::class, 'index'])->name('revisor.home');
    Route::post('/dashboard/{announcement}/accept', [RevisorController::class, 'setAccepted'])->name('revisor.accept');
    Route::post('/dashboard/{announcement}/reject', [RevisorController::class, 'setRejected'])->name('revisor.reject');
    Route::post('/dashboard/{announcement}/restore', [RevisorController::class, 'restoreAd'])->name('revisor.restore');
    Route::post('/dashboard/{announcement}/delete', [RevisorController::class, 'deleteAd'])->name('revisor.delete');


    Route::get('/dashboard/trash/', [RevisorController::class, 'trash'])->name('revisor.trash');
});



