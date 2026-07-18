<?php
// app/Http/Controllers/Admin/AuthController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Already logged in → redirect to dashboard
        if (session()->has('admin_id')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        $user = User::where('email', $request->email)
                    ->where('role', 'admin')
                    ->where('is_active', true)
                    ->first();

        // Check user exists and password matches
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials. Please try again.',
            ], 401);
        }

        // Store admin session
        session([
            'admin_id'   => $user->id,
            'admin_name' => $user->name,
            'admin_email'=> $user->email,
            'admin_role' => $user->role,
        ]);

        return response()->json([
            'success'  => true,
            'message'  => 'Welcome back, ' . $user->name . '!',
            'redirect' => route('admin.dashboard'),
        ]);
    }

    public function logout(Request $request)
    {
        session()->forget(['admin_id', 'admin_name', 'admin_email', 'admin_role']);
        session()->invalidate();
        session()->regenerateToken();

        if ($request->expectsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }
}
