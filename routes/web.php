<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CompnyController;

use Illuminate\Support\Facades\Http;
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
    $response = Http::get('http://127.0.0.1:8000/api/company',[]);
    
   // return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login');
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(CompnyController::class)->group(function () {
    Route::get('company', 'index');
    Route::post('company', 'store');
    Route::get('company/{id}', 'show');
    Route::put('company/{id}', 'update');
    Route::delete('company/{id}', 'destroy');
}); 
