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
// PUBLIC CONTROLLER
Route::get('/',[PublicController::class,'index'])->name('welcome');
Route::get('/annunci/search',[PublicController::class,'search'])->name('search');

// ANNOUNCEMENT CONTROLLER
Route::get('/create', [AnnouncementController::class, 'create'])->name('announcement.create');
Route::post('/announcement/new', [AnnouncementController::class, 'store'])->name('announcement.store');
Route::get('/{announcement}/details', [AnnouncementController::class, 'show'])->name('details');

// ANNOUNCEMENTIMAGES
Route::post('/announcement/images/upload', [AnnouncementController::class, 'uploadImage'])->name('announcement.images.upload');
Route::delete('/announcement/images/remove', [AnnouncementController::class, 'removeImage'])->name('announcement.images.remove');

//ROTTA PER CATEGORIA
Route::get('/category/{name}/{id}/announcements', [PublicController::class, 'category'])->name('category-rotta');

//ROTTA PER REVISORE
Route::get('/revisor/home', [RevisorController::class, 'revisorHome'])->name('revisor-home');
Route::post('/revisor/announcement/{id}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');
Route::post('/revisor/announcement/{id}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');

// ROTTA PER CAMBIO LINGUA
Route::post('/locale/{locale}', [PublicController::class, 'locale'])->name('locale');