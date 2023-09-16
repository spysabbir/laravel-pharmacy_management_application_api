<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\MedicineResource;
use App\Models\Medicine;
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
            'name' => 'required|string|max:255',
            'power_id' => 'required',
            'type_id' => 'required',
            'unit_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $medicine = Medicine::create($request->all());

        return $this->sendResponse(new MedicineResource($medicine), 'Medicine create successfully.');
    }

    public function show($id)
    {
        $medicine = Medicine::find($id);

        if(is_null($medicine))
        {
            return $this->sendError('Medicine not found.');
        }

        return $this->sendResponse(new MedicineResource($medicine), 'Medicine retrieved.');
    }

    public function update(Request $request, Medicine $medicine)
    {
        $validator = Validator::make($request->all(), [
            'supplier_id' => 'required',
            'name' => 'required|string|max:255',
            'power_id' => 'required',
            'type_id' => 'required',
            'unit_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $medicine->update($request->all());

        return $this->sendResponse(new MedicineResource($medicine), 'Medicine update successfully.');
    }
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return $this->sendResponse(new MedicineResource($medicine), 'Medicine delete.');
    }
}
