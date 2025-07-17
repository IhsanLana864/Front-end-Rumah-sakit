<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class SurveyController extends Controller
{
    public function showToDashboard()
    {
        $surveys = Survey::all();
        return view('admin', compact('surveys'));
    }

    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_kelamin' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'dokumen' => 'required|string|max:255',
            'survey1' => 'required|string|max:255',
            'survey2' => 'required|string|max:255',
            'survey3' => 'required|string|max:255',
            'survey4' => 'required|string|max:255',
            'survey5' => 'required|string|max:255',
            'survey6' => 'required|string|max:255',
            'survey7' => 'required|string|max:255',
            'survey8' => 'required|string|max:255',
            'survey9' => 'required|string|max:255',
        ]);

        $validatedData['tanggal'] = Carbon::now()->format('Y-m-d');
        $validatedData['jam'] = Carbon::now()->format('H:i:s');

        if ($validatedData['pekerjaan'] === 'LAINNYA' && !empty($validatedData['pekerjaan_lainnya'])) {
            // Pekerjaan sudah 'LAINNYA', data pekerjaan_lainnya akan disimpan
        } else {
            // Jika pekerjaan bukan 'LAINNYA' atau pekerjaan_lainnya kosong, set ke null
            $validatedData['pekerjaan_lainnya'] = null;
        }

        Survey::create($validatedData);

        return redirect()->route('esurvey')->with('success', 'Data berhasil ditambah');
    }

    // public function edit(Partner $partner)
    // {
    //     return view('admin.partner.edit', compact('partner'));
    // }

    // public function update(Request $request, Partner $partner)
    // {
    //     // Validasi data input
    //     $validatedData = $request->validate([
    //         'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'nama' => 'nullable|string|max:255'
    //     ]);

    //     $imagePath = $partner->gambar;

    //     if ($request->hasFile('gambar')) {
    //         // Hapus gambar lama dari storage jika ada
    //         if ($partner->gambar) {
    //             Storage::disk('public')->delete($partner->gambar);
    //         }
    //         // Simpan gambar baru
    //         $imagePath = $request->file('gambar')->store('partner', 'public');
    //     }

    //     $dataToUpdate = $validatedData;

    //     $dataToUpdate['gambar'] = $imagePath;

    //     $partner->update($dataToUpdate);

    //     return redirect()->route('admin.partner.index')->with('success', 'Data berhasil diperbarui!');
    // }

    // public function destroy(Partner $partner)
    // {
    //     if ($partner->gambar) { 
    //         Storage::disk('public')->delete($partner->gambar);
    //     }

    //     $partner->delete();

    //     return redirect()->route('admin.partner.index')->with('success', 'Data berhasil dihapus!');
    // }
}
