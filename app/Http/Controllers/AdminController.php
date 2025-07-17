<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function showProfile()
    {
        $admin = Auth::user();

        if ($admin) {
            return view('admin.akun.show', compact('admin'));
        } else {
            return redirect()->route('login')->with('error', 'Anda harus login sebagai admin untuk mengakses halaman ini.');
        }
    }

    public function editMyProfile()
    {
        $admin = Auth::user();

        if (!$admin) {
            return redirect()->route('login')->with('error', 'Silakan login untuk mengedit profil Anda.');
        }

        return view('admin.akun.edit', compact('admin'));
    }

    public function updateMyProfile(Request $request)
    {
        $admin = Auth::user();

        if (!$admin) {
            return redirect()->route('login')->with('error', 'Autentikasi diperlukan untuk memperbarui profil.');
        }

        // Validasi data input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($admin->id)],
            'password' => ['nullable', 'confirmed', Password::defaults()],
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

        $admin->update($updateData);

        return redirect()->route('profile')->with('success', 'Data admin berhasil diperbarui!');
    }
}
