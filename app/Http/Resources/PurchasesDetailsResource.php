<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchasesDetailsResource extends JsonResource
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
            'medicine_id' => $this->medicine_id,
            'medicine_name' => $this->medicine->name,
            'type_name' => $this->medicine->type->name,
            'power_name' => $this->medicine->power->name,
            'unit_name' => $this->medicine->unit->unit_name,
            'purchases_quantity' => $this->purchases_quantity,
            'purchases_price' => $this->purchases_price,
        ];
    }
}
