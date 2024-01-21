<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SalesSummeryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'sales_invoice_no' => $this->sales_invoice_no,
            'customer_id' => $this->customer_id,
            'customer_name' => $this->customer->name,
            'sub_total' => $this->sub_total,
            'discount' => $this->discount,
            'grand_total' => $this->grand_total,
            'payment_status' => $this->payment_status,
            'payment_amount' => $this->payment_amount,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'salesDetails' => SalesDetailsResource::collection($this->whenLoaded('salesDetails')),
        ];
    }
}
