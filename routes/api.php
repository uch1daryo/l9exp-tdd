<?php

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

Route::get('customers', function () {
    return response()->json(Customer::select(['id', 'name'])->get());
});
Route::post('customers', function (Request $request) {
    if (!$request->json('name')) {
        return response()->make('', Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    $customer = new Customer();
    $customer->name = $request->json('name');
    $customer->save();
});
Route::get('customers/{customer_id}', function () {});
Route::put('customers/{customer_id}', function () {});
Route::delete('customers/{customer_id}', function () {});
Route::get('reports', function () {});
Route::post('reports', function () {});
Route::get('reports/{report_id}', function () {});
Route::put('reports/{report_id}', function () {});
Route::delete('reports/{report_id}', function () {});
