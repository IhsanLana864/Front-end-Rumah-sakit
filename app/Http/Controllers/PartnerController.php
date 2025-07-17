<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partner.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'nullable|string|max:255'
        ]);

        $fotoPath = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fotoPath = $file->store('partner', 'public'); 
        }

        Partner::create([
            'gambar' => $fotoPath,
            'nama' => $request->nama
        ]);

        return redirect()->route('admin.partner.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partner.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'nullable|string|max:255'
        ]);

        $imagePath = $partner->gambar;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            if ($partner->gambar) {
                Storage::disk('public')->delete($partner->gambar);
            }
            // Simpan gambar baru
            $imagePath = $request->file('gambar')->store('partner', 'public');
        }

        $dataToUpdate = $validatedData;

        $dataToUpdate['gambar'] = $imagePath;

        $partner->update($dataToUpdate);

        return redirect()->route('admin.partner.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->gambar) { 
            Storage::disk('public')->delete($partner->gambar);
        }

        $partner->delete();

        return redirect()->route('admin.partner.index')->with('success', 'Data berhasil dihapus!');
    }
}
