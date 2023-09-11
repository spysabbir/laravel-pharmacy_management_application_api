<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends BaseController
{
    public function index()
    {
        $suppliers = Supplier::all();

        return $this->sendResponse(SupplierResource::collection($suppliers), 'Supplier retrieved successfully.');
    }
}
