<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('pages.admin.index');
});


// ADMIN
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    //Halaman Dashboard Admin (Grafik)
    Route::get('index', function () {
        return view('pages.admin.index'); 
    })->name('admin.index');

   Route::resource('users', UserController::class)->names([
        'index'   => 'admin.users.index',
        'create'  => 'admin.users.create',
        'store'   => 'admin.users.store',
        'edit'    => 'admin.users.edit',
        'update'  => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);

    });