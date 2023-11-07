<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\PurchasesSummeryResource;
use App\Models\PurchasesDetails;
use App\Models\PurchasesSummery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PurchasesController extends BaseController
{
    public function index()
    {
        $purchasesSummery = PurchasesSummery::all();

        return $this->sendResponse($purchasesSummery, 'Purchases summery retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'supplier_id' => 'required',
            'sub_total' => 'required',
            'grand_total' => 'required',
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

        foreach ($request->purchaseCartData as $item) {
            PurchasesDetails::create([
                'purchases_invoice_no' => $purchases_invoice_no,
                'medicine_id' => $item['id'],
                'purchases_quantity' => $item['purchases_quantity'],
                'purchases_price' => $item['purchases_price'],
                'created_at' => Carbon::now()
            ]);
        }

        return $this->sendResponse($purchasesSummery, 'Purchasing successfully.');
    }

    public function show($id)
    {
        $purchasesSummery = PurchasesSummery::find($id);

        if(is_null($purchasesSummery))
        {
            return $this->sendError('Purchases summery not found.');
        }

        return $this->sendResponse($purchasesSummery, 'Purchases summery retrieved.');
    }

    public function update(Request $request, PurchasesSummery $purchasesSummery)
    {

    }

    public function destroy(PurchasesSummery $purchasesSummery)
    {

        $purchasesSummery->delete();

        return $this->sendResponse($purchasesSummery, 'Purchases summery delete.');
    }
}
