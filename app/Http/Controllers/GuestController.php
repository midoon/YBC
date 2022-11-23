<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    public function doRegister(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);

        $validatedData["password"] = Hash::make($validatedData["password"]);
        User::create($validatedData);
        // dd($request);
        return redirect('/');
    }
}
