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
        $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => [
                'required',
                'file',
                'mimes:jpeg,png,jpg,gif,svg',
                function ($attribute, $value, $fail) {
                    if ($value->getClientOriginalExtension() === 'svg' || $value->getMimeType() === 'image/svg+xml') {
                        return;
                    }

                    $validator = validator(['temp_image' => $value], ['temp_image' => 'image']);
                    if ($validator->fails()) {
                        $fail("The {$attribute} field must be a valid image (non-SVG type failed image check).");
                    }
                }
            ],
            'alamat' => 'required|string',
            'long' => 'required|string|max:255',
            'lat' => 'required|string|max:255',
            'falsafah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'motto' => 'required|string',
            'budaya_kerja' => 'required|string',
            'eksternal' => 'required|string',
            'kontak' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        $fotoPath = null;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fotoPath = $file->store('company', 'public');
        }

        $dataToStore = $request->except('logo');
        $dataToStore['logo'] = $fotoPath;

        Company::create($dataToStore);

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
            'logo' => 'image|mimes:jpeg,png,jpg,gif',
            'alamat' => 'required|string',
            'long' => 'required|string|max:255',
            'lat' => 'required|string|max:255',
            'falsafah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'motto' => 'required|string',
            'budaya_kerja' => 'required|string',
            'eksternal' => 'required|string',
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
