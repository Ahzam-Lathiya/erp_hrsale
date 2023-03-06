<?php

use App\Http\Controllers\AssetsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/demo', function () {
    return view('demo', [
        'page_title' => 'Demo',
        'main_heading' => 'Demo'
    ]);
});

Route::get('/login', [LoginController::class, 'login']);

//Route::resource('assets', AssetsController::class);
Route::get('/assets/create', [AssetsController::class, 'create'])->name('assets.create');
Route::post('/assets', [AssetsController::class, 'store'])->name('assets.store');

?>