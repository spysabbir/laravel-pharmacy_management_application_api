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
        Schema::create('purchases_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchases_summery_id');
            $table->integer('medicine_id');
            $table->integer('purchases_quantity')->default(0);
            $table->float('purchases_price')->default(0);
            $table->timestamps();

            $table->foreign('purchases_summery_id')->references('id')->on('purchases_summeries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases_details');
    }
};
