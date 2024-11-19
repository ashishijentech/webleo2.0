<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\ComponentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth','role:superadmin'])->group(function () {
    
    Route::get('/superadmin/dashboard',[SuperController::class,'dashboard'])->name('superadmin.dashboard');
    Route::get('/superadmin/all-admins', [AdminController::class, 'index'])->name('superadmin.admin');

    Route::get('/superadmin/create-element', [ElementController::class, 'index'])->name('superadmin.element.create');
    Route::post('/superadmin/create-element', [ElementController::class, 'store'])->name('superadmin.element.store');
    Route::post('/superadmin/component-element', [ComponentController::class, 'store'])->name('superadmin.component.store');

    Route::get('/superadmin/element/component-list/{element_id}', [ComponentController::class, 'list'])->name('superadmin.element.component');
});


//agent routes
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('agent.dashboard');
});
require __DIR__.'/auth.php';
