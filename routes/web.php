<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/add_doctor_view',[App\Http\Controllers\AdminController::class,'index']);
Route::post('/upload-doctor',[App\Http\Controllers\AdminController::class,'store']);
Route::post('/appointment',[App\Http\Controllers\HomeController::class,'store']);

Route::get('/myappointment',[App\Http\Controllers\HomeController::class,'myappointment']);
Route::get('/cancel_appointment/{id}',[App\Http\Controllers\HomeController::class,'cancelAppointment']);

Route::get('/showappoinment',[App\Http\Controllers\AdminController::class,'showappoinment']);

Route::get('/approve/{id}',[App\Http\Controllers\AdminController::class,'approved']);

Route::get('/cancell/{id}',[App\Http\Controllers\AdminController::class,'cancell']);


Route::get('/alldoctor',[App\Http\Controllers\AdminController::class,'alldoctor']);

Route::get('/deletedoctor/{id}',[App\Http\Controllers\AdminController::class,'deletedoctor']);

Route::get('/cancell/{id}',[App\Http\Controllers\AdminController::class,'cancell']);

Route::get('/updatedoctor/{id}',[App\Http\Controllers\AdminController::class,'updatedoctor']);

Route::post('/update_doctor/{id}',[App\Http\Controllers\AdminController::class,'update']);

Route::get('/emailview/{id}',[App\Http\Controllers\AdminController::class,'emailview']);

Route::post('/sendmail/{id}',[App\Http\Controllers\AdminController::class,'sendmail']);
