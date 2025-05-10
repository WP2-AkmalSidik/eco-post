<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'terms' => 'required|accepted',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user',
            ]);

            // Log out any existing user
            auth()->logout();

            // Return to login page with success message
            return redirect()->route('login')->with('swal', [
                'icon' => 'success',
                'title' => 'Registration Successful!',
                'text' => 'Your account has been created. Please login to continue.',
                'confirmButtonText' => 'Login Now',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            $errors = $e->validator->errors()->all();
            $errorMessage = implode('<br>', $errors);

            return back()->with('swal', [
                'icon' => 'error',
                'title' => 'Registration Failed',
                'html' => $errorMessage,
                'confirmButtonText' => 'Try Again',
            ])->withInput($request->except('password', 'password_confirmation'));
        }
    }

    protected function redirectTo()
    {
        if (auth()->user()->isAdmin()) {
            return redirect('/admin/dashboard');
        }
        return redirect('/user/dashboard');
    }
}
