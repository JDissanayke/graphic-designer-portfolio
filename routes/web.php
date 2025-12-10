<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\sotri8controller;
use App\Http\Controllers\Stori8AdminController;

// Route::get('/', function () {
//     return view('front-view.index');
// })->name('index');

//front pages
Route::get('/', [sotri8controller::class, 'Home'])->name('index');
Route::get('/protfolio', [sotri8controller::class, 'Protfolio'])->name('protfolio');

Route::get('/about', [sotri8controller::class, 'aboutUs'])->name('about_us');
Route::get('/about', [sotri8controller::class, 'aboutUs'])->name('about_us');

Route::get('/login', [Stori8AdminController::class, 'Login'])->name('Login');
Route::post('/login-user', [Stori8AdminController::class, 'doLogin'])->name('doLogin');
Route::post('/logout', [Stori8AdminController::class, 'logout'])->name('logout');
//fornt pages


//admin pages
Route::middleware(['auth'])->group(function () {

Route::get('/admin', [Stori8AdminController::class, 'Admin'])->name('admin')->middleware('auth');

//admin main post
Route::get('/admin/post', [Stori8AdminController::class, 'PostCreate'])->name('post');
Route::post('/admin/poststore', [Stori8AdminController::class, 'poststore'])->name('poststore');
Route::get('/admin/fetchAllposts', [Stori8AdminController::class, 'fetchAllposts'])->name('fetchAllposts');
Route::delete('/admin/postdelete/{id}', [sotri8controller::class,'destroy'])->name('post_delete');
Route::patch('/admin/posts/{id}/status', [Stori8AdminController::class, 'updateStatus'])->name('posts.updateStatus');

//admin details post
Route::get('/admin/details', [Stori8AdminController::class, 'AddDetails'])->name('adddetails');
Route::get('/admin/details/fetch', [Stori8AdminController::class, 'fetchDetails']);
Route::post('/admin/details/add', [Stori8AdminController::class, 'addWorkDetails']);
Route::delete('/admin/details/delete', [sotri8controller::class, 'deleteWorkDetail']);

//admin user
Route::get('/admin/users', [UserController::class, 'User'])->name('users');
Route::get('/admin/users-fetch-all', [UserController::class, 'fetchAlluser'])->name('users-fetch');
Route::post('/admin/users-add-user', [UserController::class, 'AddUser'])->name('users-add');
Route::delete('/admin/user-delete', [UserController::class, 'deleteUser']);


});
