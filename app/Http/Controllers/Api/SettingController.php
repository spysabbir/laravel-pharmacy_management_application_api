<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\DefaultSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SettingController extends BaseController
{
    // Change Env Function
    public function changeEnv($envKey, $envValue)
    {
        $envFilePath = app()->environmentFilePath();
        $strEnv = file_get_contents($envFilePath);
        $strEnv.="\n";
        $keyStartPosition = strpos($strEnv, "{$envKey}=");
        $keyEndPosition = strpos($strEnv, "\n",$keyStartPosition);
        $oldLine = substr($strEnv, $keyStartPosition, $keyEndPosition-$keyStartPosition);

        if(!$keyStartPosition || !$keyEndPosition || !$oldLine){
            $strEnv.="{$envKey}={$envValue}\n";
        }else{
            $strEnv=str_replace($oldLine, "{$envKey}={$envValue}",$strEnv);
        }
        $strEnv=substr($strEnv, 0, -1);
        file_put_contents($envFilePath, $strEnv);
    }

    public function defaultSettings() {
        $defaultSettings = DefaultSetting::first();

        if(is_null($defaultSettings))
        {
            return $this->sendError('Default settings not found.');
        }

        return $this->sendResponse($defaultSettings, 'Default settings retrieved successfully.');
    }

    public function defaultSettingsUpdateo(Request $request)
    {
        $defaultSettings = DefaultSetting::first();

        $validator = Validator::make($request->all(), [
            'app_name' => 'required',
            'app_url' => 'required',
            'app_email' => 'required',
            'app_phone_number' => 'required',
            'app_address' => 'required',
            'app_currency' => 'required',
            'app_currency_symbol' => 'required',
            'app_timezone' => 'required',
            // 'app_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            // 'app_favicon' => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $this->changeEnv("APP_NAME", "'$request->app_name'");
        $this->changeEnv("APP_URL", "'$request->app_url'");
        $this->changeEnv("TIME_ZONE", "'$request->app_timezone'");

        $defaultSettings->update([
            'app_name' => $request->app_name,
            'app_url' => $request->app_url,
            'app_email' => $request->app_email,
            'app_phone_number' => $request->app_phone_number,
            'app_address' => $request->app_address,
            'app_currency' => $request->app_currency,
            'app_currency_symbol' => $request->app_currency_symbol,
            'app_timezone' => $request->app_timezone,
            'created_at' => Carbon::now(),
        ]);

        // Logo Upload
        if($request->hasFile('app_logo')){
            if($defaultSettings->app_logo != 'default_logo.png'){
                unlink(base_path("public/uploads/default_photo/").$defaultSettings->app_logo);
            }
            $manager = new ImageManager(new Driver());
            $logo_name = "App-Logo".".". $request->file('app_logo')->getClientOriginalExtension();
            $image = $manager->read($request->file('app_logo'));
            $image->toJpeg(80)->save(base_path("public/uploads/default_photo/").$logo_name);
            $defaultSettings->update([
                'app_logo' => $logo_name
            ]);
        }

        // Favicon Upload
        if($request->hasFile('app_favicon')){
            if($defaultSettings->app_favicon != 'default_favicon.png'){
                unlink(base_path("public/uploads/default_photo/").$defaultSettings->app_favicon);
            }
            $manager = new ImageManager(new Driver());
            $favicon_name = "App-Favicon".".". $request->file('app_favicon')->getClientOriginalExtension();
            $image = $manager->read($request->file('app_favicon'));
            $image->toJpeg(80)->save(base_path("public/uploads/default_photo/").$favicon_name);
            $defaultSettings->update([
                'app_favicon' => $favicon_name
            ]);
        }

        return $this->sendResponse($defaultSettings, 'Default settings updated successfully.');
    }
}
