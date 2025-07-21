<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class SurveyController extends Controller
{
    // USER
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_kelamin' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'pekerjaan_lainnya' => 'nullable|string|max:255',
            'layanan' => 'required|string|max:255',
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

        if ($validatedData['pekerjaan'] === 'LAINNYA') {
            // Gunakan nilai dari input 'pekerjaan_lainnya' sebagai nilai 'pekerjaan' yang akan disimpan
            // Pastikan input 'pekerjaan_lainnya' tidak kosong jika 'LAINNYA' dipilih
            if (empty($validatedData['pekerjaan_lainnya'])) {
                // Anda bisa menambahkan validasi atau pesan error di sini
                // Contoh: return redirect()->back()->withErrors(['pekerjaan_lainnya' => 'Mohon sebutkan pekerjaan lainnya.']);
                // Untuk saat ini, kita akan biarkan pekerjaan_lainnya tetap kosong jika tidak diisi
                $validatedData['pekerjaan'] = 'LAINNYA (Tidak disebutkan)'; // Beri nilai default jika kosong
            } else {
                $validatedData['pekerjaan'] = $validatedData['pekerjaan_lainnya'];
            }
        }

        unset($validatedData['pekerjaan_lainnya']);

        try {
            // Simpan data ke database
            Survey::create($validatedData);

            return redirect()->route('esurvey')->with('success', 'Survey berhasil dikirim');
        } catch (\Illuminate\Database\QueryException $e) {
            \Log::error('Error saving survey: ' . $e->getMessage(), ['data' => $validatedData]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        } catch (\Exception $e) {
            \Log::error('An unexpected error occurred: ' . $e->getMessage(), ['data' => $validatedData]);
            return redirect()->back()->with('error', 'Terjadi kesalahan tak terduga: ' . $e->getMessage());
        }
    }

    // ADMIN
    public function index()
    {
        $surveys = Survey::all();
        return view('admin.survey.index', compact('surveys'));
    }
}
