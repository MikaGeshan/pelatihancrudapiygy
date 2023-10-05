<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //untuk register
    public function register(Request $request)
    {
        // validator
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // terdapat error
        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        // fungsi register
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        //create token
        $token = $user->createToken('auth_token')->plainTextToken;
        // response
        return response()->json([
            'msg'=>true,
            'access_token'=>$token,
            'token_type'=>'Bearer',
            'data'=>$user
        ]);
    }
}
