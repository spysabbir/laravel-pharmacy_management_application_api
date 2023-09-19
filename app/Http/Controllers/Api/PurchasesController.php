<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\PurchasesSummeryResource;
use App\Models\PurchasesSummery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PurchasesController extends BaseController
{
    public function index()
    {
        $purchasesSummery = PurchasesSummery::all();

        return $this->sendResponse(PurchasesSummeryResource::collection($purchasesSummery), 'Purchases Summery retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'supplier_id' => 'required',
            'payment_status' => 'required',
            'payment_amount' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $purchases_invoice_no = "PI-".PurchasesSummery::max('id')+1;

        $purchasesSummery = PurchasesSummery::create([
            'purchases_invoice_no' => $purchases_invoice_no,
            'supplier_id' => $request->supplier_id,
            'sub_total' => $request->sub_total,
            'discount' => $request->discount,
            'grand_total' => $request->grand_total,
            'payment_status' => $request->payment_status,
            'payment_amount' => $request->payment_amount,
            'created_at' => Carbon::now()
        ]);

        return $this->sendResponse(new PurchasesSummeryResource($purchasesSummery), 'Purchases Summery create successfully.');
    }

    public function show($id)
    {
        $purchasesSummery = PurchasesSummery::find($id);

        if(is_null($purchasesSummery))
        {
            return $this->sendError('Purchases Summery not found.');
        }

        return $this->sendResponse(new PurchasesSummeryResource($purchasesSummery), 'Purchases Summery retrieved.');
    }

    public function update(Request $request, PurchasesSummery $purchasesSummery)
    {
        $validator = Validator::make($request->all(), [
            'supplier_id' => 'required',
            'payment_status' => 'required',
            'payment_amount' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $purchasesSummery->update([
            'supplier_id' => $request->supplier_id,
            'sub_total' => $request->sub_total,
            'discount' => $request->discount,
            'grand_total' => $request->grand_total,
            'payment_status' => $request->payment_status,
            'payment_amount' => $request->payment_amount,
            'updated_at' => Carbon::now()
        ]);

        return $this->sendResponse(new PurchasesSummeryResource($purchasesSummery), 'Purchases Summery update successfully.');
    }
    public function destroy(PurchasesSummery $purchasesSummery)
    {
        $purchasesSummery->delete();

        return $this->sendResponse(new PurchasesSummeryResource($purchasesSummery), 'Purchases Summery delete.');
    }
}
