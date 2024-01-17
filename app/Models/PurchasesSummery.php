<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasesSummery extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function purchasesDetails()
    {
        return $this->hasMany(PurchasesDetails::class, 'purchases_summery_id');
    }
}
