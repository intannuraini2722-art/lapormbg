<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AutentikasiController extends Controller
{
    // Tampilkan Halaman Register
    public function tampilRegister() {
        return view('auth.register');
    }

    // Proses Simpan User Baru
    public function simpanRegister(Request $request) {
        $pesan = [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'jenis_kelamin.required' => 'Pilih jenis kelamin Anda.',
            'alamat.required' => 'Alamat tidak boleh kosong.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username ini sudah digunakan, silakan pilih yang lain.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ];
        $request->validate([
            'name' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'username' => 'required|string|unique:users',
            'password' => 'required|min:6|confirmed'
        ], $pesan);

        $user = User::create([
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'masyarakat', // Default role
        ]);

        if($user) {
            return redirect()->route('login')->with('sukses', 'Akun berhasil dibuat! Silakan masuk.');
        }

        return back()->with('error', 'Gagal menyimpan data.');
    }

    // Tampilkan Halaman Login
    public function tampilLogin() {
        return view('auth.login');
    }

    // Proses Masuk
    public function username()
    {
        return 'username';
    }

    public function autentikasi(Request $request) {
        // 1. Validasi dengan pesan Bahasa Indonesia kustom
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi.', // Ini akan menggantikan pesan "email required"
            'password.required' => 'Password tidak boleh kosong.',
        ]);

        $kredensial = $request->only('username', 'password');

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // 2. Jika gagal, kirim pesan error khusus username
        return back()->withErrors([
            'username' => 'Username atau password yang Anda masukkan salah.',
        ])->onlyInput('username');
        }

    // Keluar
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
