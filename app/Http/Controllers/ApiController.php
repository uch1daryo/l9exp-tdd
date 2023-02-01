<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    public function getCustomers(): JsonResponse
    {
        return response()->json(Customer::select(['id', 'name'])->get());
    }

    public function postCustomers(Request $request)
    {
        if (!$request->json('name')) {
            return response()->make('', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $customer = new Customer();
        $customer->name = $request->json('name');
        $customer->save();
    }
}
