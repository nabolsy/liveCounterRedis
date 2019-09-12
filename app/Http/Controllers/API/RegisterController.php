<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator,Hash;
class RegisterController extends Controller
{
    public function register(Request $request) {
        $credentials = $request->only('name', 'email', 'password');
        $check = [
            'name' => 'required|max:255',
            'email' => 'required|max:255|min:8|unique:users',
            'password'=> 'required|min:6',
        ];


        $validator = Validator::make($credentials, $check);
        if($validator->fails())
        {
            return response()->json(['success'=>false, 'errors'=> $validator->errors() ], 401);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        //$user->phone = $request->phone;
        //$user->profile_image = $request->image;
        $user->save();

        return response()->json(['success'=>true, 'message'=>'Successfully Registered'], 200);
    }
}
