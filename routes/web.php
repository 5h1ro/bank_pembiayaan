<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewStudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('/');

require __DIR__ . '/auth.php';


Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/loginpost', [LoginController::class, 'login'])->name('loginpost');
Route::get('/register', [LoginController::class, 'register'])->middleware('guest')->name('register');
Route::post('/registerpost', [LoginController::class, 'post'])->name('registerpost');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::middleware(['admin'])->group(function () {
        Route::get('admin', [AdminController::class, 'index'])->name('admin');
        Route::get('admin/detaildata{id}', [AdminController::class, 'detail'])->name('admin.detaildata');

        Route::get('admin/newstudent/acc{id}', [NewStudentController::class, 'acc'])->name('admin.newstudent.acc');
        Route::get('admin/newstudent/cadangan{id}', [NewStudentController::class, 'cadangan'])->name('admin.newstudent.cadangan');
        Route::get('admin/newstudent/cancel{id}', [NewStudentController::class, 'cancel'])->name('admin.newstudent.cancel');


        Route::get('admin/user', [AdminController::class, 'user'])->name('admin.user');
        Route::get('admin/delete={id}', [AdminController::class, 'delete'])->name('admin.user.delete');
        Route::post('admin/add', [AdminController::class, 'add'])->name('admin.user.add');
        Route::post('admin/edit={id}', [AdminController::class, 'edit'])->name('admin.user.edit');
    });
    Route::middleware(['user'])->group(function () {
        Route::get('user', [UserController::class, 'index'])->name('user');
        Route::get('user/pdf={id}', [NewStudentController::class, 'pdf'])->name('user.pdf');
        Route::post('user/add', [NewStudentController::class, 'add'])->name('user.add');
    });
});
