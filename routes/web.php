<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PreInscription\PreInscriptionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use Illuminate\View\View;


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
Route::get('/pré_inscription', [ PreInscriptionController ::class , 'preinscription'])->name('preincription');

Route::post('/pré_inscription', [ PreInscriptionController ::class , 'store'])->name('preincriptionValidation');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {   return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/dashbord/apercu', [ PreInscriptionController::class , 'show'])->name('viewPreincriptionValidation');

Route::resource('/admin/preinscriptions', AdminController::class)->names('admin.preinscriptions');

Route::post('/admin/preinscriptions', [AdminController::class, 'update'])->name('admin.preinscriptions.updat');

// Route::resource('/admin/posts', AdminController::class)->except('show')->names('admin.posts');

// Route::get('/admin/preinscriptions/{pre_inscriptions}', [AdminController::class, 'show'])->name('admin.preinscriptions.show');
