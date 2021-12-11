<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
        ]);
        $token = $user->createToken('tokenApp')->plainTextToken;
        $response =[
            'user'=> $user,
            'token'=> $token
        ];
        
        return response($response, 201);

    }
    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return ['msg'=>'Le token a bien été supprimé, déconnection.'];
    }
    public function login(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
        $user = User::where('email',$request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)){
            return response(['msg'=>'wrong authentification'],401);
        }
        $token = $user->createToken('tokenApp')->plainTextToken;
        $response =[
            'user'=> $user,
            'token'=> $token
        ];
        return response($response, 201);
    }

}
