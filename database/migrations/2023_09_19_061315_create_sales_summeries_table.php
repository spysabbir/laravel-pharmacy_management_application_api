<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales_summeries', function (Blueprint $table) {
            $table->id();
            $table->string('sales_invoice_no');
            $table->integer('customer_id');
            $table->float('sub_total');
            $table->float('discount')->nullable();
            $table->float('grand_total');
            $table->string('payment_status');
            $table->float('payment_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_summeries');
    }
};
