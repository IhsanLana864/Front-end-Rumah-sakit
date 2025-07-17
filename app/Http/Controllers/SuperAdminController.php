<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule; // <-- Ganti Rules menjadi Rule untuk validasi unique
use Illuminate\Validation\Rules;

class SuperAdminController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'admin')->get();
        return view('admin.akun.index', compact('users'));
    }

    public function create()
    {
        return view('admin.akun.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        return redirect()->route('admin.akun.index')->with('success', 'Akun admin berhasil ditambahkan!');
    }

    public function edit(User $user)
    {
        return view('admin.akun.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi data input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // ## PENINGKATAN 1: Validasi email diperbaiki agar tidak error saat email tidak diubah ##
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            // Password dibuat tidak wajib diisi saat update
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        // Siapkan data untuk diupdate
        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // ## PENINGKATAN 2: Cek jika ada password baru, lalu hash dan update ##
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);

        return redirect()->route('admin.akun.index')->with('success', 'Data admin berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Cari user berdasarkan ID
        $userToDelete = User::find($id);

        if ($userToDelete) {
            $userToDelete->delete();
            return redirect()->route('admin.akun.index')->with('success', 'Akun admin berhasil dihapus!');
        } else {
            return redirect()->route('admin.akun.index')->with('error', 'Akun tidak ditemukan.');
        }
    }
}
