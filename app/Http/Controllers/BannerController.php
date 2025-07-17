<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'nullable|string|max:255'
        ]);

        $fotoPath = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fotoPath = $file->store('banner', 'public'); 
        }

        Banner::create([
            'gambar' => $fotoPath,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'nullable|string|max:255'
        ]);

        $imagePath = $banner->gambar;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            if ($banner->gambar) {
                Storage::disk('public')->delete($banner->gambar);
            }
            // Simpan gambar baru
            $imagePath = $request->file('gambar')->store('banner', 'public');
        }

        $dataToUpdate = $validatedData;

        $dataToUpdate['gambar'] = $imagePath;

        $banner->update($dataToUpdate);

        return redirect()->route('admin.banner.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->gambar) { 
            Storage::disk('public')->delete($banner->gambar);
        }

        $banner->delete();

        return redirect()->route('admin.banner.index')->with('success', 'Data berhasil dihapus!');
    }
}
