<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule; // <-- Ganti Rules menjadi Rule untuk validasi unique
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function showProfile()
    {
        $admin = Auth::user();

        if ($admin) {;
            return view('admin.akun.show', compact('admin'));
        } else {
            return redirect()->route('login')->with('error', 'Anda harus login sebagai admin untuk mengakses halaman ini.');
        }
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
}
