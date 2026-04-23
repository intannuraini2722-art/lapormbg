<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required',
        ];

        $messages = [
            'required' => ':attribute wajib diisi.',
            'unique' => ':attribute sudah terdaftar.',
            'min' => ':attribute minimal :min karakter.',
            'in' => ':attribute harus dipilih sesuai pilihan yang ada.',
        ];

        $attributes = [
            'name' => 'Nama Lengkap',
            'username' => 'Username',
            'password' => 'Password',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
        ];

        $request->validate($rules, $messages, $attributes);

        User::create([
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username,' . $id,
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'role' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'role' => $request->role,
        ];

        // Cek apakah user mengisi password baru
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return back()->with('success', 'Data user berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
        $user = User::findOrFail($id);
        $user->delete();

        // Pastikan nama route ini sesuai dengan yang ada di web.php Anda
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    } catch (\Exception $e) {
        return back()->with('error', 'Gagal menghapus user: ' . $e->getMessage());
    }
    }

}
