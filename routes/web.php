<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts',[\App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::get('/posts/create',[\App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::get('/posts/{post}',[\App\Http\Controllers\PostController::class, 'show'])->name('post.show');
    Route::post('/posts',[\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::patch('/posts/{post}',[\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    Route::delete('/posts/{post}',[\App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');
    Route::get('/posts/{post}/edit',[\App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::get('/homeworks',[\App\Http\Controllers\HomeworkController::class, 'index'])->name('homework.index');
    Route::post('/homeworks',[\App\Http\Controllers\HomeworkController::class, 'store'])->name('homework.store');
    Route::get('/homeworks/{school_class}/{Subject}',[\App\Http\Controllers\HomeworkController::class, 'create'])->name('homework.create');

    Route::get('/school_classes',[\App\Http\Controllers\SchoolClassController::class, 'index'])->name('school_classes.index');
    Route::get('/school_classes/get',[\App\Http\Controllers\SchoolClassController::class, 'getClasses'])->name('school_classes.get');
    Route::post('/school_classes',[\App\Http\Controllers\SchoolClassController::class, 'store'])->name('school_classes.store');

});
require __DIR__.'/auth.php';
