<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\HealthInsuranceController;
use App\Http\Controllers\LoanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/institutions',[InstitutionController::class,'index']);
Route::get('/healthInsurances',[HealthInsuranceController::class,'index']);
Route::post('/loan/calculate',[LoanController::class,'calculate']);
