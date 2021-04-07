<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Models\Property;


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
    $properties = Property::all();
    return view('welcome')->with('properties',$properties);
});

Route::get('/properties/{id}', function ($id) {
    $property = Property::find($id);
    return view('/property-show')->with('property',$property);
});

Route::get('/properties', function () {
    if(request()->has('search')){
        $search = request()->get('search');
        $properties = Property::Where('location', 'like', '%'.$search.'%')->orWhere('price', 'like', '%'.$search.'%')->orWhere('type', 'like', '%'.$search.'%')
        ->paginate(10);
      }else{
        $properties = Property::orderBy('created_at','desc')->paginate(20);
      } 
   
    return view('properties')->with('properties',$properties);
});

Route::get('/dashboard/property/create', [DashboardController::class, 'propertyForm']);
Route::post('/dashboard/property/create', [DashboardController::class, 'storeProperty']);
Route::get('/dashboard/property/edit/{id}', [DashboardController::class, 'editPropertyForm']);
Route::patch('/dashboard/property/edit/{id}', [DashboardController::class, 'updateProperty']);
Route::delete('/dashboard/property/delete/{id}', [DashboardController::class, 'deleteProperty']);

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
