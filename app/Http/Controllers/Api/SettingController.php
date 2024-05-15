<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\DefaultSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends BaseController
{
    public function defaultSettings() {
        $defaultSettings = DefaultSetting::first();

        if(is_null($defaultSettings))
        {
            return $this->sendError('Default settings not found.');
        }

        return $this->sendResponse($defaultSettings, 'Default settings retrieved successfully.');
    }

    public function defaultSettingsUpdate(Request $request)
    {
        $defaultSettings = DefaultSetting::first();

        $validator = Validator::make($request->all(), [
            'app_name' => 'required',
            'app_email' => 'required',
            'app_phone' => 'required',
            'app_address' => 'required',
            'app_currency' => 'required',
            'app_currency_symbol' => 'required',
            'app_timezone' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $defaultSettings->update([
            'app_name' => $request->app_name,
            'app_email' => $request->app_email,
            'app_phone' => $request->app_phone,
            'app_address' => $request->app_address,
            'app_currency' => $request->app_currency,
            'app_currency_symbol' => $request->app_currency_symbol,
            'app_timezone' => $request->app_timezone,
            'created_at' => Carbon::now(),
        ]);

        return $this->sendResponse($defaultSettings, 'Default settings updated successfully.');
    }
}
