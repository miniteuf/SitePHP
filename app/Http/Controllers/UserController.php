<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit_name(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        
        $user= User::find(Auth::id());
        $user->name=$request->name;
        $user->save();
        return back();
    }
}
