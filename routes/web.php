<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SongController; //importo il controller
use App\Http\Controllers\HomeController; //importo il controller


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

Route::get('/', [HomeController::class, 'index'])->name('homepage'); //Controller statico per la home

Route::resource('songs', SongController::class);//Controller CRUD per lista e dettaglio

//Route::get('/songs', [SongController::class, 'index'])->name('songs.index'); //Controller per la lista

//Route::get('/songs/{song}', [SongController::class, 'show'])->name('songs.show'); //Controller per il dettaglio

//Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create'); //Controller per la creazione