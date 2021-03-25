<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


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

Route::get('/dashboard/account/landlord/{id}', [DashboardController::class, 'editLandlord']);
Route::patch('/dashboard/account/landlord/{id}', [DashboardController::class, 'landlordAction']);
Route::patch('/dashboard/account/resubmit-landlord/{id}', [DashboardController::class, 'landlordResubmission']);

Route::get('/dashboard/account/create-student', [DashboardController::class, 'studentForm']);
Route::post('/dashboard/account/create-student', [DashboardController::class, 'createStudent']);
Route::get('/dashboard/account/create-landlord', [DashboardController::class, 'landlordForm']);
Route::get('/dashboard/account', [DashboardController::class, 'editAccount']);
Route::get('/dashboard/account/user/{id}', [DashboardController::class, 'editUser']);
Route::delete('/dashboard/account/user/{id}', [DashboardController::class, 'deleteUser']);
Route::patch('/dashboard/account/update-password/{id}', [DashboardController::class, 'updatePassword']);
Route::patch('/dashboard/account/update-details/{id}', [DashboardController::class, 'updateDetails']);

Route::post('/dashboard/account/create-landlord', [DashboardController::class, 'createLandlord']);
Route::get('/dashboard/select-account', [DashboardController::class, 'SelectAccount']);
Route::post('/dashboard/assign-role', [DashboardController::class, 'assignRole']);

Route::resource('/dashboard', DashboardController::class);

require __DIR__.'/auth.php';
