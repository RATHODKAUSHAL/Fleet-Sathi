<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function loginSubmit(Request $request) {
        // Validate the input fields
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);
    
        // Attempt to find the user by email
        $user = User::where('email', $credentials['email'])->first();
    
        // Check if the user exists
        if (!empty($user)) {
            if (!is_null($user->password)) {
                if (Auth::guard()->attempt($credentials)) {
                    return redirect()->route('dashboard')->with('success', 'Login successful!');
                } else {
                    $request->session()->flash('error', 'Invalid password. Please try again.');
                }
            } else {
                $request->session()->flash('error', 'No password set for this account.');
            }
        } else {
            $request->session()->flash('error', 'No user found with the provided email.');
        }
    
        return redirect()->route('admin.auth.login');
    }
    
}
