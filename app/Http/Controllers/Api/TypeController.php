<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\TypeResource;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends BaseController
{
    public function index()
    {
        $types = Type::all();

        return $this->sendResponse(TypeResource::collection($types), 'Type retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $type = Type::create($request->all());

        return $this->sendResponse(new TypeResource($type), 'Type create successfully.');
    }

    public function show($id)
    {
        $type = Type::find($id);

        if(is_null($type))
        {
            return $this->sendError('Type not found.');
        }

        return $this->sendResponse(new TypeResource($type), 'Type retrieved.');
    }

    public function update(Request $request, Type $type)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $type->update([
            'name' => $request->name,
            'updated_at' => Carbon::now()
        ]);

        return $this->sendResponse(new TypeResource($type), 'Type update successfully.');
    }
    public function destroy(Type $type)
    {
        $type->delete();

        return $this->sendResponse(new TypeResource($type), 'Type delete.');
    }
}
