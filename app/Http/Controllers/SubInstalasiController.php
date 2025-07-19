<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sub_Instalasi;
use App\Models\Instalasi;

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
        $validatedData = $request->validate([
            'instalasi_id' => 'required|exists:instalasis,id',
            'nama_sub' => 'required|string|max:255',
        ]);

        Sub_Instalasi::create($validatedData);

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
        ]);

        $subInstalasi->update($validatedData);

        return redirect()->route('admin.sub-instalasi.index')->with('success', 'Sub Instalasi berhasil diperbarui!');
    }

    public function destroy(Sub_Instalasi $subInstalasi)
    {
        $subInstalasi->delete();
        return redirect()->route('admin.sub-instalasi.index')->with('success', 'Sub Instalasi berhasil dihapus!');
    }
}
