<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ApiController::class)->group(function () {
    Route::get('customers', 'getCustomers');
    Route::post('customers', 'postCustomers');
    Route::get('customers/{customer_id}', 'getCustomer');
    Route::put('customers/{customer_id}', 'putCustomer');
    Route::delete('customers/{customer_id}', 'deleteCustomer');
    Route::get('reports', 'getReports');
    Route::post('reports', 'postReports');
    Route::get('reports/{report_id}', 'getReport');
    Route::put('reports/{report_id}', 'putReport');
    Route::delete('reports/{report_id}', 'deleteReport');
});
