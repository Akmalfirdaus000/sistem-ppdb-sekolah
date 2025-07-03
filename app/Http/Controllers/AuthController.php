<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:2',
        ]);

        $user = User::where("email", $request->input('email'))->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan'])->onlyInput('email');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah.']);
        }

        Auth::login($user, $request->has('remember_me'));
        $request->session()->regenerate();

        Log::info('User Login:', ['email' => $user->email, 'role' => $user->role, 'ip' => $request->ip()]);

        // ✅ Redirect berdasarkan peran (role)
        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard')->with('message', 'Login berhasil'),
            'siswa' => redirect()->route('siswa.dashboard')->with('message', 'Login berhasil'),
            default => redirect()->route('login')->with('error', 'Role tidak dikenali'),
        };
    }

    public function register_action(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:150|unique:users,email',
            'password' => 'required|string|min:2|confirmed',
        ]);

        try {
            $user = User::create([
                'name' => $valid['name'],
                'email' => $valid['email'],
                'password' => Hash::make($valid['password']),
                'role' => 'siswa', // Default role tetap siswa
            ]);

            Auth::loginUsingId($user->id);

            // ✅ Log aktivitas registrasi berhasil
            Log::info('User Registered:', ['email' => $valid['email'], 'ip' => $request->ip()]);

           return redirect()->route('siswa.dashboard')->with('message', 'Login berhasil');

        } catch (\Throwable $th) {
            // 🚨 Log jika registrasi gagal
            Log::error('Gagal Registrasi:', ['error' => $th->getMessage(), 'ip' => $request->ip()]);

            return back()->with('error', 'Terjadi kesalahan, coba lagi.');
        }
    }

    public function logout(Request $request)
    {
        $email = Auth::user()->email;

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // ✅ Log aktivitas logout
        Log::info('User Logout:', ['email' => $email, 'ip' => $request->ip()]);

        return redirect('/login')->with('message', 'Logout berhasil');
    }
}
