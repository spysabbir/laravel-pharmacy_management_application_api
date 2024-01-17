<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchasesSummeryResource extends JsonResource
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
            'purchases_invoice_no' => $this->purchases_invoice_no,
            'supplier_id' => $this->supplier_id,
            'supplier_name' => $this->supplier->name,
            'sub_total' => $this->sub_total,
            'discount' => $this->discount,
            'grand_total' => $this->grand_total,
            'payment_status' => $this->payment_status,
            'payment_amount' => $this->payment_amount,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'purchasesDetails' => PurchasesDetailsResource::collection($this->whenLoaded('purchasesDetails')),
        ];
    }
}
