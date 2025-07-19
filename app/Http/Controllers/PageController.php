<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Company;
use App\Models\Dokter;
use App\Models\Manajerial;
use App\Models\Sosmed;
use App\Models\Berita;

class PageController extends Controller
{
    //Layout Main
    public function mainPage()
    {
        $company = Company::first();
        return view('layouts.main', compact('company'));
    }

    //Beranda
    public function beranda()
    {
        $banners = Banner::first();
        $company = Company::first();
        return view('index', compact('banners', 'company'));
    }

    //PROFILE
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

    //Berita & Artikel
    public function berita()
    {
        $company = Company::first();
        $sosmeds = Sosmed::all();
        $beritas = Berita::all();
        return view('artikel', compact('company', 'sosmeds', 'beritas'));
    }

    public function detailBerita(Berita $berita)
    {
        $company = Company::first();
        $sosmeds = Sosmed::all();
        return view('detail-berita', compact('company', 'sosmeds', 'berita'));
    }

    //E-Survey
    public function esurvey()
    {
        $company = Company::first();
        $sosmeds = Sosmed::all();
        return view('esurvey', compact('company', 'sosmeds'));
    }

    //Kontak
    public function kontak()
    {
        $company = Company::first();
        $sosmeds = Sosmed::all();
        return view('kontak', compact('company', 'sosmeds'));
    }
}
