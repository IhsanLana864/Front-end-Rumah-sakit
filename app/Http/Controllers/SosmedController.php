<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sosmed;
use Illuminate\Support\Facades\Storage;

class SosmedController extends Controller
{
    public function index()
    {
        $sosmeds = Sosmed::all();
        return view('admin.sosmed.index', compact('sosmeds'));
    }

    public function create()
    {
        return view('admin.sosmed.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif',
            'nama_sosmed' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'link' => 'required|string|max:255' 
        ]);

        $fotoPath = null;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fotoPath = $file->store('sosmed', 'public'); 
        }

        Sosmed::create([
            'logo' => $fotoPath,
            'nama_sosmed' => $request->nama_sosmed,
            'username' => $request->username,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.sosmed.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit(Sosmed $sosmed)
    {
        return view('admin.sosmed.edit', compact('sosmed'));
    }

    public function update(Request $request, Sosmed $sosmed)
    {
        $validatedData = $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif',
            'nama_sosmed' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'link' => 'required|string|max:255'
        ]);

        $imagePath = $sosmed->logo;

        if ($request->hasFile('logo')) {
            if ($sosmed->logo) {
                Storage::disk('public')->delete($sosmed->logo);
            }
            $imagePath = $request->file('logo')->store('sosmed', 'public');
        }

        $dataToUpdate = $validatedData;

        $dataToUpdate['logo'] = $imagePath;

        $sosmed->update($dataToUpdate);

        return redirect()->route('admin.sosmed.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Sosmed $sosmed)
    {
        if ($sosmed->logo) { 
            Storage::disk('public')->delete($sosmed->logo);
        }

        $sosmed->delete();

        return redirect()->route('admin.sosmed.index')->with('success', 'Data berhasil dihapus!');
    }
}
