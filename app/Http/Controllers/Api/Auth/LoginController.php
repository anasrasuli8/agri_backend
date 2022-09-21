<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhoneRequest;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\VerifyPhoneRequest;
use App\Models\SmsCode;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function storePhone(StorePhoneRequest $request){
        $code = 5555;
//        $code = rand(1000,9999);
        SmsCode::updateOrCreate([
            'phone' => $request->phone
        ],
            [
                'code' => $code,
                'try' => 0,
            ]
        );
        return response()->json([
            'phone' => $request->phone,
            'message' => 'code sent successfully.'
        ]);
    }
    public function verifyPhone(VerifyPhoneRequest $request)
    {
        $user = User::where('phone', $request->phone)->firstOrNew();

        if (!$user->exists) {
            $user = $user->create([
                'phone' => $request->phone,
            ]);
        }

        return response()->json([
            'token' => $user->createToken('auth_token')->plainTextToken,
            'user' => $user
        ]);
    }
    public function storePrfile(StoreProfileRequest $request){
        $request['profile_completed_at'] = now();
        $request->user()->update($request->all());

        return response()->json([
            'user' => auth()->user()
        ]);
    }

    public function getUser(){
        return auth()->user();
    }

    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();

        return response()->json(['successfully logout auth']);
    }
}
