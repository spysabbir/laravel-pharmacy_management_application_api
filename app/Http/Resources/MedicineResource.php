<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicineResource extends JsonResource
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
            'supplier_id' => $this->supplier_id,
            'supplier_name' => $this->supplier->name,
            'type_id' => $this->type_id,
            'type_name' => $this->type->name,
            'name' => $this->name,
            'power' => $this->power->name,
            'unit' => $this->unit->unit_name,
            'rack' => $this->rack->name,
            'purchases_price' => $this->purchases_price,
            'sales_price' => $this->sales_price,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
