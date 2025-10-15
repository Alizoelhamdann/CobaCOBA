<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| ROUTES PUBLIK (PENGUNJUNG WEBSITE)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    
    // Halaman Dashboard Admin (Akan menjadi landing page setelah login)
    // Menggantikan route /dashboard yang lama
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard'); 

    Route::resource('posts', PostController::class); 

    Route::resource('categories', CategoryController::class); 
    // NANTI TAMBAH: Route::resource('pages', PageController::class); 
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard'); 
})->middleware(['auth', 'verified'])->name('dashboard'); 


// Route Profile bawaan Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
