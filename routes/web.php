<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;


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
Route::get('/login', [PageController::class,'showLoginForm'])->name('login-form');
Route::get('/register', [PageController::class,'showRegisterForm'])->name('register-form');
Route::post('/login', [UserController::class,'login'])->name('login-process');
Route::post('/register', [UserController::class,'register'])->name('register-process');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'cekroles:admin']], function() {
    Route::get('/admin', [PageController::class,'adminpage'])->name('admin');
    Route::get('/users/changerole', [PageController::class, 'changerolepage'])->name('crole-page');
    Route::get('/users/{userId}/changerole', [PageController::class, 'changeUserRoleForm'])
    ->name('crole-form');
    Route::post('/users/{userId}/changeroleprocess', [UserController::class, 'changeUserRole'])
    ->name('crole-process');
    Route::get('/product/createproduct', [PageController::class, 'createProductForm'])->name('createProductForm');
    Route::post('/product/createproduct', [UserController::class, 'createProduct'])->name('createProductProcess');
});
Route::group(['middleware' => ['auth', 'cekroles:admin,guest,user']], function() {
    Route::get('/home', [PageController::class,'homepage'])->name('home');
    Route::get('/user', [PageController::class,'userpage'])->name('user');
    Route::get('/{productId}/product', [PageController::class, 'showDetailProduct'])->name('showDetailProduct');
});
Route::group(['middleware' => ['auth', 'cekroles:admin,guest']], function() {
    Route::get('/status', [PageController::class,'statuspage'])->name('status-page');
});
Route::group(['middleware' => ['auth', 'cekroles:admin,user']], function() {
    Route::post('/{productId}/comment', [UserController::class,'comment'])->name('comment');
});
