<?php

use App\Http\Controllers\DashboardController;
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

//auth route for both
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

//for users
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard/my profile', [DashboardController::class, 'myProfile'])->name('dashboard.my profile');
});

//for blogwriters
Route::group(['middleware' => ['auth', 'role:blogwriter']], function () {
    Route::get('/dashboard/postcreate', [DashboardController::class, 'createPost'])->name('dashboard.postcreate');
});

Route::post('/uploads',[DashboardController::class, 'store']);

require __DIR__ . '/auth.php';
