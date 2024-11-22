<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\Wlpcontroller;
use App\Http\Controllers\ManufacturerController;

require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('auth.login');
});
Route::middleware(['auth','role:user'])->group(function () {

Route::get('/dashboard', function () {
    return view('dashboard');
});
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth','role:superadmin'])->group(function () {
    
    Route::get('/superadmin/dashboard',[SuperController::class,'dashboard'])->name('superadmin.dashboard');
    Route::get('/superadmin/admins-list', [AdminController::class, 'index'])->name('superadmin.admin');
    Route::get( '/superadmin/onboard/admin', [AdminController::class, 'create'])->name('superadmin.create.admin');
    Route::post('/superadmin/onboard/admin', [AdminController::class, 'store'])->name('superadmin.store.admin');
    

    Route::get('/superadmin/create-element', [ElementController::class, 'index'])->name('superadmin.element.create');
    Route::post('/superadmin/create-element', [ElementController::class, 'store'])->name('superadmin.element.store');
    Route::post('/superadmin/component-element', [ComponentController::class, 'store'])->name('superadmin.component.store');

    Route::get('/superadmin/element/component-list/{element_id}', [ComponentController::class, 'list'])->name('superadmin.element.component');
});


//admin routes
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get( '/admin/onboard/wlp', [Wlpcontroller::class, 'create_wlp'])->name('admin.create.wlp');
    Route::post( '/admin/onboard/wlp', [Wlpcontroller::class, 'store'])->name('admin.store.wlp');
    Route::get( '/admin/wlp/list', [Wlpcontroller::class, 'index'])->name('admin.wlp');

});

//Wlp routes
Route::middleware(['auth','role:wlp'])->group(function () {
    Route::get('/wlp/dashboard',[Wlpcontroller::class,'dashboard'])->name('wlp.dashboard');
    Route::get('/wlp/onboard/manufacturer',[ManufacturerController::class,'create'])->name('wlp.create.manufacturer');

});

