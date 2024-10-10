<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [userController::class, 'login']);

Route::get('user/dashboard',[userController::class, 'dashboard'])->name('dashboard');
Route::get('user/add_user',[userController::class, 'add_user'])->name('add_user');

Route::post('user/store_user',[userController::class, 'create_user'])->name('create_user');

Route::get('/dataTable',[userController::class, 'dataTable'])->name('dataTable');
Route::get('user/add_role',[userController::class, 'add_role'])->name('add_role');

Route::post('user/new_role',[userController::class,'new_role'])->name('new_role');
