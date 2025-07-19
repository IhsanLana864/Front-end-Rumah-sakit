<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('admin.company.index', compact('companies'));
    }

    public function create()
    {
        return view('admin.company.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Data
        $request->validate([
            'nama' => 'required|string|max:255',
            // --- MODIFIKASI VALIDASI UNTUK 'LOGO' ---
            'logo' => [
                'required', // Tetap required jika logo wajib ada saat membuat Company baru
                // Atau 'nullable' jika logo opsional: 'logo' => ['nullable', 'file', ...]
                'file', // Memastikan bahwa ini adalah file yang di-upload
                'mimes:jpeg,png,jpg,gif,svg', // Mengizinkan format-format ini
                'max:2048', // Ukuran maksimal 2MB
                function ($attribute, $value, $fail) {
                    // Cek jika file adalah SVG atau jika MIME type-nya adalah image/svg+xml
                    // Untuk SVG, kita tidak perlu validasi 'image' bawaan PHP yang mungkin gagal
                    if ($value->getClientOriginalExtension() === 'svg' || $value->getMimeType() === 'image/svg+xml') {
                        return; // Lolos untuk SVG, karena sudah divalidasi oleh 'file' dan 'mimes'
                    }

                    // Untuk format gambar lain (jpeg, png, gif, jpg), kita tetap ingin memastikan itu adalah gambar valid.
                    // Gunakan validator internal untuk menerapkan aturan 'image' hanya pada non-SVG.
                    $validator = validator(['temp_image' => $value], ['temp_image' => 'image']);
                    if ($validator->fails()) {
                        $fail("The {$attribute} field must be a valid image (non-SVG type failed image check).");
                    }
                }
            ],
            // --- AKHIR MODIFIKASI VALIDASI 'LOGO' ---
            'alamat' => 'required|string',
            'long' => 'required|string|max:255',
            'lat' => 'required|string|max:255',
            'falsafah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'motto' => 'required|string',
            'budaya_kerja' => 'required|string',
            'kontak' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        // 2. Proses Upload Logo
        $fotoPath = null;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            // Simpan file ke storage/app/public/company (sesuai 'company' disk public)
            $fotoPath = $file->store('company', 'public');
        }

        // 3. Siapkan Data untuk Disimpan ke Database
        // Ambil semua data yang sudah divalidasi
        $dataToStore = $request->except('logo'); // Ambil semua data kecuali 'logo' karena itu file
        $dataToStore['logo'] = $fotoPath; // Tambahkan path logo yang sudah di-upload

        // 4. Buat Record Baru
        Company::create($dataToStore); // Pastikan model Company memiliki $fillable yang sesuai

        // 5. Redirect kembali dengan pesan sukses
        return redirect()->route('admin.company.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit(Company $company)
    {
        return view('admin.company.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'alamat' => 'required|string',
            'long' => 'required|string|max:255',
            'lat' => 'required|string|max:255',
            'falsafah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'motto' => 'required|string',
            'budaya_kerja' => 'required|string',
            'kontak' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        $imagePath = $company->logo;

        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $imagePath = $request->file('logo')->store('company', 'public');
        }

        $dataToUpdate = $validatedData;

        $dataToUpdate['logo'] = $imagePath;

        $company->update($dataToUpdate);

        return redirect()->route('admin.company.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Company $company)
    {
        if ($company->logo) { 
            Storage::disk('public')->delete($company->logo);
        }

        $company->delete();

        return redirect()->route('admin.company.index')->with('success', 'Data berhasil dihapus!');
    }
}
