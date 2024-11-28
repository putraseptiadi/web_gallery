<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi email dan password
        $credentials = $request->only('email', 'password');

        // Cek apakah kredensial valid
        if (Auth::attempt($credentials)) {
            // Jika login berhasil, beri notifikasi dan arahkan ke dashboard
            return redirect()->route('admin.dashboard')->with('success', 'Welcome back!');
        }

        // Jika login gagal, beri pesan error dan kembali ke halaman login
        return redirect()->route('login')
            ->with('error', 'Salah, coba lagi!');
    }
}
