<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(LoginRequest $request){
        // return $request->email;
        $user = User::where('email', $request->email)->first();
        if($user && Hash::check($request->password, $user->password)){
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['access_token' => $token], 200);
        }
        return response()->json(['error' => 'Unauthorized account. Can not login!'], 401);
    }
    
    public function logout(){
        Auth::guard('sanctum')->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

}
