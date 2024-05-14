<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\SalesSummeryResource;
use App\Models\Medicine;
use App\Models\SalesDetails;
use App\Models\SalesSummery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalesController extends BaseController
{
    public function index()
    {
        $salesSummery = SalesSummery::all();

        return $this->sendResponse(SalesSummeryResource::collection($salesSummery), 'Sales summery retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'sub_total' => 'required',
            'grand_total' => 'required',
            'payment_status' => 'required',
            'payment_amount' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $sales_invoice_no = "SI-".SalesSummery::max('id')+1;

        $salesSummery = SalesSummery::create([
            'sales_invoice_no' => $sales_invoice_no,
            'customer_id' => $request->customer_id,
            'sub_total' => $request->sub_total,
            'discount' => $request->discount,
            'grand_total' => $request->grand_total,
            'payment_status' => $request->payment_status,
            'payment_amount' => $request->payment_amount,
            'created_at' => Carbon::now()
        ]);

        foreach ($request->saleCartData as $item) {
            SalesDetails::create([
                'sales_summery_id' => $salesSummery->id,
                'medicine_id' => $item['medicine_id'],
                'sales_quantity' => $item['sales_quantity'],
                'sales_price' => $item['sales_price'],
                'created_at' => Carbon::now()
            ]);
            Medicine::where('id', $item['medicine_id'])->increment('sales_quantity', $item['sales_quantity']);
        }

        return $this->sendResponse(new SalesSummeryResource($salesSummery), 'Selling successfully.');
    }

    public function show($id)
    {
        $salesSummery = SalesSummery::with('salesDetails')->find($id);

        if(is_null($salesSummery))
        {
            return $this->sendError('Sales summery not found.');
        }

        return $this->sendResponse(new SalesSummeryResource($salesSummery), 'Sales summery retrieved.');
    }

    public function destroy($id)
    {
        $salesSummery = SalesSummery::find($id);
        $salesSummery->delete();

        return $this->sendResponse(new SalesSummeryResource($salesSummery), 'Sales summery delete.');
    }
}
