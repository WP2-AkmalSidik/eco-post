<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            // Success alert
            return $this->redirectTo()->with('swal', [
                'icon' => 'success',
                'title' => 'Login Successful!',
                'text' => 'Welcome back, ' . auth()->user()->name . '!',
                'timer' => 3000,
                'position' => 'top-end',
            ]);
        }

        // Set error message based on whether email exists
        $user = \App\Models\User::where('email', $request->email)->first();

        $errorMessage = $user
            ? 'The password you entered is incorrect.'
            : 'No account found with that email address.';

        return back()->with('swal', [
            'icon' => 'error',
            'title' => 'Login Failed',
            'text' => $errorMessage,
            'confirmButtonText' => 'Try Again',
        ])->withInput($request->only('email'));
    }

    protected function redirectTo()
    {
        if (auth()->user()->isAdmin()) {
            return redirect()->intended('/admin/dashboard');
        }
        return redirect()->intended('/user/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('swal', [
            'icon' => 'success',
            'title' => 'Logged Out Successfully',
            'text' => 'You have been safely logged out.',
            'timer' => 2000,
        ]);
    }
}
