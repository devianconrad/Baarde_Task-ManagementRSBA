<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{

    public function index()
    {
        return view('login');
    }
    
    public function register()
    {
        return view('register');
    }
 
    public function registerPost(Request $request)
{
    
    $existingUser = User::where('name', $request->name)->first();
    if ($existingUser) {
        return redirect()->back()->withInput($request->except('password'))->withErrors(['name' => 'The name is already taken. Please choose a different name.']);
    }

    $existingEmail = User::where('email', $request->email)->first();
    if ($existingEmail) {
    return redirect()->back()->withInput($request->except('password'))->withErrors(['email' => 'The email is already taken. Please choose a different email.']);
}
    
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);

    $user->save();

    return redirect('login')->with('success', 'Registered successfully');
}
 
    public function login()
    {
        return view('login');
    }
 
    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
 
        if (Auth::attempt($credentials)) {
            return redirect('/home')->with('success', 'Login Success');
        }
 
        return back()->with('error', 'Invalid Email or Password');
    }
 
    public function logout()
    {
        Auth::logout();
 
        return redirect()->route('login');
    }
}