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
        Schema::create('sales_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sales_summery_id');
            $table->integer('medicine_id');
            $table->integer('sales_quantity')->default(0);
            $table->float('sales_price')->default(0);
            $table->timestamps();

            $table->foreign('sales_summery_id')->references('id')->on('sales_summeries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_details');
    }
};
