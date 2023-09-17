<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends BaseController
{
    public function index()
    {
        $customers = Customer::all();

        return $this->sendResponse(CustomerResource::collection($customers), 'Customer retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'address' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $customer = Customer::create($request->all());

        return $this->sendResponse(new CustomerResource($customer), 'Customer create successfully.');
    }

    public function show($id)
    {
        $customer = Customer::find($id);

        if(is_null($customer))
        {
            return $this->sendError('Customer not found.');
        }

        return $this->sendResponse(new CustomerResource($customer), 'Customer retrieved.');
    }

    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'address' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ]);

        return $this->sendResponse(new CustomerResource($customer), 'Customer update successfully.');
    }
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return $this->sendResponse(new CustomerResource($customer), 'Customer delete.');
    }
}
