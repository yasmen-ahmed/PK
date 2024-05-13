<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
Use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatUserRequest;
use App\Http\Requests\LoginRequest;


class AuthController extends Controller
{
    public function create(CreatUserRequest $request){
        try {
       
        $user =new User();
        $user->email=$request->email;
        $user->name=$request->name;
        $user->password=\Hash::make($request->password);
        $user->role=$request->role;
        $user->save();

        return [
            '$user'=>$user,
            'token'=> $user->createToken('ios')->plainTextToken
        ];
    } catch (\Throwable $th) {
        return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 500);
    }


    }


    public function login(LoginRequest $request){
        
       if(\Auth::attempt($request->only('email','password'))){
          return [
            'user'=>\Auth::user(),
            'token'=>\Auth::user()->createToken('ForRole')->plainTextToken
        ];
    }
        else{
            return "it's not a valiable";
        }

       }


   

public function logout()
{
    Auth::logout();

    return 'Logged out successfully.';
}
}
