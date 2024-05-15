<?php

namespace Database\Seeders;

use App\Models\DefaultSetting;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DefaultSetting::create([
            'app_name' => 'Pharmacy',
            'app_email' => 'info@email.com',
            'app_phone' => '1234567890',
            'app_address' => '123, Street Name, City Name, Country Name',
            'app_currency' => 'BDT',
            'app_currency_symbol' => '৳',
            'app_timezone' => 'Asia/Dhaka',
            'created_at' => Carbon::now()
        ]);
    }
}
