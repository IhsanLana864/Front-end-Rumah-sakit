<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sub_Instalasi;
use App\Models\Instalasi;
use Illuminate\Support\Facades\Storage;

class SubInstalasiController extends Controller
{
    public function index()
    {
        $subInstalasis = Sub_Instalasi::with('instalasi')->latest()->get();
        return view('admin.sub-instalasi.index', compact('subInstalasis'));
    }

    public function create()
    {
        $instalasis = Instalasi::all();
        return view('admin.sub-instalasi.create', compact('instalasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'instalasi_id' => 'required|exists:instalasis,id',
            'nama_sub' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'logo' => 'string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fotoPath = $file->store('instalasi', 'public'); 
        }

        Sub_Instalasi::create([
            'instalasi_id' => $request->instalasi_id,
            'nama_sub' => $request->nama_sub,
            'keterangan' => $request->keterangan,
            'logo' => $request->logo,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.sub-instalasi.index')->with('success', 'Sub Instalasi berhasil ditambahkan!');
    }

    public function edit(Sub_Instalasi $subInstalasi)
    {
        $instalasis = Instalasi::all();
        return view('admin.sub-instalasi.edit', compact('subInstalasi', 'instalasis'));
    }

    public function update(Request $request, Sub_Instalasi $subInstalasi)
    {
        $validatedData = $request->validate([
            'instalasi_id' => 'required|exists:instalasis,id',
            'nama_sub' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'logo' => 'string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $imagePath = $subInstalasi->foto;

        if ($request->hasFile('foto')) {
            if ($subInstalasi->foto) {
                Storage::disk('public')->delete($subInstalasi->foto);
            }
            $imagePath = $request->file('foto')->store('instalasi', 'public');
        }

        $dataToUpdate = $validatedData;

        $dataToUpdate['foto'] = $imagePath;

        $subInstalasi->update($dataToUpdate);

        return redirect()->route('admin.sub-instalasi.index')->with('success', 'Sub Instalasi berhasil diperbarui!');
    }

    public function destroy(Sub_Instalasi $subInstalasi)
    {
        if ($subInstalasi->foto) { 
            Storage::disk('public')->delete($subInstalasi->foto);
        }

        $subInstalasi->delete();
        return redirect()->route('admin.sub-instalasi.index')->with('success', 'Sub Instalasi berhasil dihapus!');
    }
}
