<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;

class AuthController extends Controller
{
    // Show Login Form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Admin Login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Check credentials against customers table with direct password comparison
        $customer = DB::table('customers')
            ->where('username', $credentials['username'])
            ->where('password', $credentials['password']) // Direct password comparison
            ->first();

        if ($customer) {
            // Store customer info in session
            session(['customer_id' => $customer->customer_id]);
            
            // Redirect to the user dashboard route
            return redirect('/dashboard/user')  // Changed to match the exact route path
                ->with('success', 'Login successful!');
        }

        return back()
            ->withInput()
            ->withErrors(['login' => 'Invalid username or password']);
    }

    // Show Register Form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Customer Registration
    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:customers,username',
                'email' => 'required|string|email|max:255|unique:customers,email',
                'password' => 'required|string|min:4',
            ]);

            // Use DB transaction
            DB::beginTransaction();
            
            $customer = DB::table('customers')->insert([
                'name' => $validated['name'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => $validated['password'],
            ]);

            DB::commit();
            
            return redirect()->route('login')->with('success', 'Registration successful');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Registration failed: ' . $e->getMessage()]);
        }
    }

    // Customer Login
    public function customerLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Fetch customer by username
        $customer = DB::table('customers')->where('username', $credentials['username'])->first();

        if ($customer && $customer->password === $credentials['password']) {
            // Simulate customer login by storing customer ID in session
            session(['customer_id' => $customer->id]);

            return redirect()->route('dashboard.user');
        }

        return back()->withErrors(['Invalid customer username or password']);
    }

    // Logout
    public function logout()
    {
        // Clear session data
        session()->forget(['admin_id', 'customer_id']);
        return redirect()->route('login');
    }
}