<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Customer;
use App\Models\Medicine;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $success['token'] =  $user->createToken('RestApi')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('RestApi')->plainTextToken;
            $success['name'] =  $user->name;

            return $this->sendResponse($success, 'User login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    public function overview()
    {
        $result = [
            'countCustomer' => Customer::count(),
            'countSupplier' => Supplier::count(),
            'countMedicine' => Medicine::count(),
        ];

        if(is_null($result))
        {
            return $this->sendError('Result not found.');
        }

        return $this->sendResponse($result, 'Result retrieved.');
    }

    public function logout() {
        Auth::user()->tokens()->delete();

        return $this->sendResponse([], 'User Logout');
    }

    public function profile()
    {
        $user = User::find(auth()->user()->id);

        if(is_null($user))
        {
            return $this->sendError('User not found.');
        }

        return $this->sendResponse($user, 'User retrieved.');
    }

    public function profileUpdate(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user->update([
            'name' => $request->name,
        ]);

        return $this->sendResponse($user, 'User update successfully.');
    }

    public function passwordUpdate(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $validator = Validator::make($request->all(), [
            'current_password' => 'required|min:6|current_password',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return $this->sendResponse($user, 'Password update successfully.');
    }
}
