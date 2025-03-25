<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashbord/apercu', [ PreInscriptionController::class , 'show'])->name('viewPreinscriptionValidation');

Route::get('/pré_inscription', [ PreInscriptionController ::class , 'preinscription'])->name('preincription');

Route::post('/pré_inscription', [ PreInscriptionController ::class , 'store'])->name('preinscriptionValidation');

Route::post('/preinscription/download', [ PreInscriptionController ::class , 'download'])->name('preinscription.download');

Route::get('/dashboard', function () {   return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth','admin'])->group(function()
{
    
    
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::resource('/admin/preinscriptions', AdminController::class)->names('admin.preinscriptions');
    
    Route::post('/admin/preinscriptions', [AdminController::class, 'update'])->name('admin.preinscriptions.updat');
    
    //  route pour gerer les cathegories
    
    Route::get('/admin/categorie/index', [AdminController::class, 'indexCategory'])->name('admin.categorie.index');
    
    Route::post('/admin/categorie/store', [AdminController::class, 'storeCategory'])->name('admin.categorie.store');
    
    
    Route::delete('/admin/categorie/{cathegory}', [AdminController::class, 'destroyCategory'])->name('admin.cathegorie.destroy');
    
    Route::get('/admin/categorie/{cathegory}/edit', [AdminController::class, 'editCategory'])->name('admin.cathegorie.edit');
    
    Route::put('/admin/categorie/{cathegory}', [AdminController::class, 'updateCategory'])->name('admin.speciality.index');
    
    //  route pour gerer les specialité

    Route::get('/admin/speciality/index', [AdminController::class, 'indexSpeciality'])->name('admin.speciality.index');
    Route::post('/admin/speciality/store', [AdminController::class, 'storeSpeciality'])->name('admin.speciality.store');
    Route::put('/admin/speciality/{speciality}', [AdminController::class, 'updateSpeciality'])->name('admin.speciality.update');
    Route::delete('/admin/speciality/{speciality}', [AdminController::class, 'destroySpeciality'])->name('admin.speciality.destroy');
});


require __DIR__.'/auth.php';