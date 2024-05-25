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
        Schema::create('default_settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('app_email');
            $table->string('app_phone_number');
            $table->text('app_address');
            $table->string('app_currency');
            $table->string('app_currency_symbol');
            $table->string('app_timezone');
            $table->string('app_url');
            $table->string('app_logo')->nullable();
            $table->string('app_favicon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('default_settings');
    }
};
