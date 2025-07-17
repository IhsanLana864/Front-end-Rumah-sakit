<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manajerial;

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
        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255'
        ]);

        Manajerial::create($request->all());

        return redirect()->route('admin.manajerial.index')->with('success', 'Data Manajerial berhasil ditambahkan!');
    }

    public function edit(Manajerial $manajerial)
    {
        return view('admin.manajerial.edit', compact('manajerial'));
    }

    public function update(Request $request, Manajerial $manajerial)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255'
        ]);

        // Update data produk
        $manajerial->update($request->all());

        return redirect()->route('admin.manajerial.index')->with('success', 'Data manajerial berhasil diperbarui!');
    }

    public function destroy(Manajerial $manajerial)
    {
        $manajerial->delete();

        return redirect()->route('admin.manajerial.index')->with('success', 'Data manajerial berhasil dihapus!');
    }
}
