<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\UnitResource;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends BaseController
{
    public function index()
    {
        $units = Unit::all();

        return $this->sendResponse(UnitResource::collection($units), 'Unit retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $unit = Unit::create($request->all());

        return $this->sendResponse(new UnitResource($unit), 'Unit create successfully.');
    }

    public function show($id)
    {
        $unit = Unit::find($id);

        if(is_null($unit))
        {
            return $this->sendError('Unit not found.');
        }

        return $this->sendResponse(new UnitResource($unit), 'Unit retrieved.');
    }

    public function update(Request $request, Unit $unit)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $unit->update($request->all());

        return $this->sendResponse(new UnitResource($unit), 'Unit update successfully.');
    }
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return $this->sendResponse(new UnitResource($unit), 'Unit delete.');
    }
}
