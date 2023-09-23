<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends BaseController
{
    public function index()
    {
        $suppliers = Supplier::all();

        return $this->sendResponse(SupplierResource::collection($suppliers), 'Supplier retrieved successfully.');
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

        $supplier = Supplier::create($request->all());

        return $this->sendResponse(new SupplierResource($supplier), 'Supplier create successfully.');
    }

    public function show($id)
    {
        $supplier = Supplier::find($id);

        if(is_null($supplier))
        {
            return $this->sendError('Supplier not found.');
        }

        return $this->sendResponse(new SupplierResource($supplier), 'Supplier retrieved.');
    }

    public function update(Request $request, Supplier $supplier)
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

        $supplier->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ]);

        return $this->sendResponse(new SupplierResource($supplier), 'Supplier update successfully.');
    }
    
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return $this->sendResponse(new SupplierResource($supplier), 'Supplier delete.');
    }
}
