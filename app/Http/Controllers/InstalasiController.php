<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instalasi;

class InstalasiController extends Controller
{
    public function index()
    {
        $instalasis = Instalasi::all();
        return view('admin.instalasi.index', compact('instalasis'));
    }

    public function create()
    {
        return view('admin.instalasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_instalasi' => 'required|string|max:255',
        ]);

        Instalasi::create($request->all());

        return redirect()->route('admin.instalasi.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(Instalasi $instalasi)
    {
        return view('admin.instalasi.edit', compact('instalasi'));
    }

    public function update(Request $request, Instalasi $instalasi)
    {
        $request->validate([
            'nama_instalasi' => 'required|string|max:255',
        ]);

        $instalasi->update($request->all());

        return redirect()->route('admin.instalasi.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Instalasi $instalasi)
    {
        $instalasi->delete();

        return redirect()->route('admin.instalasi.index')->with('success', 'Data berhasil dihapus!');
    }
}
