<?php

use App\Http\Controllers\AssetsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LogicController;
use Illuminate\Support\Facades\Route;

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

Route::get('/demo', function () {
    return view('welcome');
});


Route::get('/', [LoginController::class, 'login']);
Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout']);

// Route::get('/resources', [AssetsController::class, 'index']);

Route::middleware([session_checker::class])->group(function(){
    Route::resource('resources', AssetsController::class);

    Route::get('/logic', [LogicController::class, 'index']);
});

// Route::get('/assets/create', [AssetsController::class, 'create'])->name('assets.create');
// Route::post('/assets', [AssetsController::class, 'store'])->name('assets.store');

?>