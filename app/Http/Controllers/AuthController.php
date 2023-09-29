<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function token(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where("email", $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return response()->json(['user' => $user, 'token' => $user->createToken($user->name)->plainTextToken]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'lastname' => 'required|string|max:30',
            'nickname' => 'required|string|max:15|unique:users,nickname',
            'celphone' => 'nullable|digits_between:8,10',
            'email' => 'required|email|unique:users',
            'password' => 'required|string'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->celphone = $request->celphone;
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json(['user' => $user, 'token' => $user->createToken($user->name)->plainTextToken]);
    }
    public function profile(Request $request)
    {
        return response()->json(['user' => $request->user()]);
    }
    public function refresh(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json(['token' => $user->createToken($user->name)->plainTextToken]);
    }
}
