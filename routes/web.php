<?php

use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/create', [MainController::class, 'create'])->name('create');

Route::get('/find', [MainController::class, 'find'])->name('find');

Route::get('/delete', [MainController::class, 'delete'])->name('delete');

Route::post('/create/check', [MainController::class, 'create_check']);

Route::get('/find/check', [MainController::class, 'find_check']);

Route::post('/delete/check', [MainController::class, 'delete_check']);




