<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\RackResource;
use App\Models\Rack;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RackController extends BaseController
{
    public function index()
    {
        $racks = Rack::all();

        return $this->sendResponse(RackResource::collection($racks), 'Rack retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $rack = Rack::create($request->all());

        return $this->sendResponse(new RackResource($rack), 'Rack create successfully.');
    }

    public function show($id)
    {
        $rack = Rack::find($id);

        if(is_null($rack))
        {
            return $this->sendError('Rack not found.');
        }

        return $this->sendResponse(new RackResource($rack), 'Rack retrieved.');
    }

    public function update(Request $request, Rack $rack)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $rack->update([
            'name' => $request->name,
            'updated_at' => Carbon::now()
        ]);

        return $this->sendResponse(new RackResource($rack), 'Rack update successfully.');
    }

    public function destroy(Rack $rack)
    {
        $rack->delete();

        return $this->sendResponse(new RackResource($rack), 'Rack delete.');
    }
}
