<?php

use App\Http\Controllers\NotesController;
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

Route::get('/', [NotesController::class, 'home'])->name('home');

Route::get('/create', [NotesController::class, 'create'])->name('create');

Route::get('/find', [NotesController::class, 'find'])->name('find');

Route::post('/create/check', [NotesController::class, 'create_check']);

Route::get('/find/check', [NotesController::class, 'find_check']);

Route::post('/delete/check', [NotesController::class, 'delete_check']);

Route::get('/update', [NotesController::class, 'update'])->name('update');

Route::post('/update/check', [NotesController::class, 'update_check'])->name('update_check');





