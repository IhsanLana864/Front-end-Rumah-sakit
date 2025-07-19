<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Company;
use App\Models\Dokter;
use App\Models\Manajerial;

class PageController extends Controller
{
    public function beranda()
    {
        $banners = Banner::first();
        $company = Company::first();
        return view('index', compact('banners', 'company'));
    }

    public function profile()
    {
        $company = Company::first();
        return view('profil.tentang-kami', compact('company'));
    }

    public function dokter()
    {
        $dokter = Dokter::all();
        return view('profil.dokter', compact('dokter'));
    }

    public function manajerial()
    {
        $manajerial = Manajerial::all();
        return view('profil.manajemen', compact('manajerial'));
    }
}
