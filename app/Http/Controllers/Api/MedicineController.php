<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\MedicineResource;
use App\Models\Medicine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicineController extends BaseController
{
    public function index()
    {
        $medicines = Medicine::all();

        return $this->sendResponse(MedicineResource::collection($medicines), 'Medicine retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'supplier_id' => 'required',
            'type_id' => 'required',
            'name' => 'required|string|max:255',
            'power_id' => 'required',
            'unit_id' => 'required',
            'rack_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $medicine = Medicine::create($request->all());

        return $this->sendResponse(new MedicineResource($medicine), 'Medicine create successfully.');
    }

    public function update(Request $request, Medicine $medicine)
    {
        $validator = Validator::make($request->all(), [
            'supplier_id' => 'required',
            'type_id' => 'required',
            'name' => 'required|string|max:255',
            'power_id' => 'required',
            'unit_id' => 'required',
            'rack_id' => 'required',
            'purchases_price' => 'required',
            'sales_price' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $medicine->update([
            'supplier_id' => $request->supplier_id,
            'type_id' => $request->type_id,
            'name' => $request->name,
            'power_id' => $request->power_id,
            'unit_id' => $request->unit_id,
            'rack_id' => $request->rack_id,
            'purchases_price' => $request->purchases_price,
            'sales_price' => $request->sales_price,
            'updated_at' => Carbon::now()
        ]);

        return $this->sendResponse(new MedicineResource($medicine), 'Medicine update successfully.');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return $this->sendResponse(new MedicineResource($medicine), 'Medicine delete.');
    }
}
