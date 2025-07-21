<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manajerial;
use Illuminate\Support\Facades\Storage;

class ManajerialController extends Controller
{
    public function index()
    {
        $manajerials = Manajerial::all();
        return view('admin.manajerial.index', compact('manajerials'));
    }

    public function create()
    {
        return view('admin.manajerial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fotoPath = $file->store('manajerial', 'public'); 
        }

        Manajerial::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $fotoPath
        ]);

        return redirect()->route('admin.manajerial.index')->with('success', 'Data Manajerial berhasil ditambahkan!');
    }

    public function edit(Manajerial $manajerial)
    {
        return view('admin.manajerial.edit', compact('manajerial'));
    }

    public function update(Request $request, Manajerial $manajerial)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $imagePath = $manajerial->foto;

        if ($request->hasFile('foto')) {
            if ($manajerial->foto) {
                Storage::disk('public')->delete($manajerial->foto);
            }
            $imagePath = $request->file('foto')->store('manajerial', 'public');
        }

        $dataToUpdate = $validatedData;

        $dataToUpdate['foto'] = $imagePath;

        $manajerial->update($dataToUpdate);

        return redirect()->route('admin.manajerial.index')->with('success', 'Data manajerial berhasil diperbarui!');
    }

    public function destroy(Manajerial $manajerial)
    {
        $manajerial->delete();

        return redirect()->route('admin.manajerial.index')->with('success', 'Data manajerial berhasil dihapus!');
    }
}
