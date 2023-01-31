<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

//Show login page

Route::get('/', [TaskController::class, 'show_login'])->name('show_login')->middleware('guest');

//Show register page

Route::get('/register', [TaskController::class, 'show_register'])->middleware('guest');

//Show index page

Route::get('/index', [TaskController::class, 'index'])->middleware('auth');

//Show edit page

Route::get('/index/edit/{id}', [TaskController::class, 'edit'])->middleware('auth');

//Create new task

Route::post('index/post', [TaskController::class, 'create'])->middleware('auth');

//Delete task

Route::delete('index/tasks/{id}', [TaskController::class, 'destroy'])->middleware('auth');

//Update confirmed

Route::put('index/tasks/{id}', [TaskController::class, 'update'])->middleware('auth');

//Update task

Route::put('index/task/{id}', [TaskController::class, 'update_task'])->middleware('auth');

//Register new user

Route::post('register/users', [UserController::class, 'create']);

//Logout

Route::post('index/logout', [UserController::class, 'logout']);

//Authanticate

Route::post('users/authenticate', [UserController::class, 'authenticate']);



