<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UploadController;
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
    Route::get('/dashboard', [UploadController::class, 'show'])->name('dashboard');
    Route::get('/download/{file}', [UploadController::class, 'download']);
    Route::get('/dashboard/view/{id}', [UploadController::class, 'view']);
});
//for users
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard/my profile', [DashboardController::class, 'myProfile'])->name('dashboard.my profile');
    Route::get('dashboard/resources/{id}', [SubjectController::class, 'index']);
});

//for admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard/subjects', [DashboardController::class, 'addSubject'])->name('dashboard.subjects');
    Route::post('/dashboard/addsubject', [SubjectController::class, 'addSubject']);
    Route::get('/dashboard/subjects', [SubjectController::class, 'viewSubjects'])->name('dashboard.subjects');
    Route::post('/uploads', [UploadController::class, 'store']);
    Route::get('/dashboard/edit/{id}', [UploadController::class, 'edit']);
    Route::put('/dashboard/update/{id}', [UploadController::class, 'update']);
    Route::get('/dashboard/delete/{id}', [UploadController::class, 'delete']);
});


require __DIR__ . '/auth.php';
