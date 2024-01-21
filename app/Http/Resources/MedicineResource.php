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
            'power_id' => $this->power_id,
            'power_name' => $this->power->name,
            'unit_id' => $this->unit_id,
            'unit_name' => $this->unit->unit_name,
            'piece_in_unit' => $this->unit->piece_in_unit,
            'rack_id' => $this->rack_id,
            'rack_name' => $this->rack->name,
            'purchases_quantity' => $this->purchases_quantity,
            'sales_quantity' => $this->sales_quantity,
            'purchases_price' => $this->purchases_price,
            'sales_price' => $this->sales_price,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
