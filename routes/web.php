<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [PageController::class, 'index']);
Route::get('/header', [PageController::class, 'header']);
Route::get('/footer', [PageController::class, 'footer']);
Route::get('/edit', [PageController::class, 'edit']);
Route::get('/delete', [PageController::class, 'delete']);
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/complete', [PageController::class, 'complete'])->name('complete');
Route::get('/complete-page', function () {
    return view('complete');
})->name('complete-page');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/edit/{id}', [PageController::class, 'editContact'])->name('edit');
Route::post('/update/{id}', [PageController::class, 'updateContact'])->name('update');

Route::get('/delete/{id}', [PageController::class, 'deleteContact'])->name('delete');

Route::get('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

Route::get('/complete', [ContactController::class, 'complete'])->name('contact.complete');
Route::post('/complete', [ContactController::class, 'complete'])->name('contact.complete');
