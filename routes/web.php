<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Rute Publik (Frontend)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/berita/{post}', [ArticleController::class, 'show'])->name('articles.show');

/*
|--------------------------------------------------------------------------
| Rute Pengguna Terotentikasi
|--------------------------------------------------------------------------
*/
// Rute ini untuk SEMUA pengguna yang sudah login (User & Admin)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Rute Khusus Admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Hapus route admin/dashboard dari sini
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('posts', PostController::class);
});

require __DIR__.'/auth.php';