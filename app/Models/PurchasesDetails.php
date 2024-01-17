<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasesDetails extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function purchasesSummery()
    {
        return $this->belongsTo(PurchasesSummery::class, 'purchases_summery_id');
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
}
