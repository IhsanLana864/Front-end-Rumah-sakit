<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Company;
use App\Models\Dokter;
use App\Models\Manajerial;
use App\Models\Sosmed;
use App\Models\Berita;
use App\Models\Partner;
use App\Models\Kegiatan;
use App\Models\Layanan;
use App\Models\Instalasi;
use App\Models\Sub_Instalasi;
use App\Models\Facilitie;
use App\Models\Internal;
use App\Models\Tentang_Kami;

class PageController extends Controller
{
    //Layout Main
    public function mainPage()
    {
        $company = Company::first();
        $sosmeds = Sosmed::all();
        return view('layouts.main', compact('company', 'sosmeds'));
    }

    //Beranda
    public function beranda()
    {
        $banners = Banner::first();
        $company = Company::first();
        $sosmeds = Sosmed::all();
        $dokters = Dokter::limit(6)->get();
        $Sub_Instalasis = Sub_Instalasi::limit(6)->get();
        $internal = Internal::first();
        return view('index', compact('banners', 'company', 'dokters','Sub_Instalasis', 'internal', 'sosmeds'));
    }

    //Layanan & Fasilitas
    public function layanan()
    {
        $company = Company::first();
        $sosmeds = Sosmed::all();
        $layanans = Layanan::all();
        $instalasis = Instalasi::with('subInstalasis')->get();
        return view('layanan-fasilitas.layanan', compact('company', 'layanans', 'instalasis', 'sosmeds'));
    }

    public function fasilitas()
    {
        $company = Company::first();
        $sosmeds = Sosmed::all();
        $facilities = Facilitie::all();

        return view('layanan-fasilitas.fasilitas', compact('company', 'facilities', 'sosmeds'));
    }

    //Kegiatan
    public function kegiatan()
    {
        $company = Company::first();
        $sosmeds = Sosmed::all();
        $kegiatans = Kegiatan::all();
        return view('kegiatan', compact('company', 'kegiatans', 'sosmeds'));
    }

    //Profil
    public function profile()
    {
        $company = Company::first();
        $sosmeds = Sosmed::all();
        $partners = Partner::all();
        $internal = Internal::first();
        $tentang_kami = Tentang_Kami::first();
        return view('profil.tentang-kami', compact('company', 'partners', 'internal', 'tentang_kami', 'sosmeds'));
    }

    public function dokter()
    {
        $dokters = Dokter::all();
        $company = Company::first();
        $sosmeds = Sosmed::all();
        return view('profil.dokter', compact('dokters', 'company', 'sosmeds'));
    }

    public function manajerial()
    {
        $manajerials = Manajerial::all();
        $company = Company::first();
        $sosmeds = Sosmed::all();
        return view('profil.manajemen', compact('manajerials', 'company', 'sosmeds'));
    }

    //Berita & Artikel
    public function berita()
    {
        $company = Company::first();
        $sosmeds = Sosmed::all();
        $beritas = Berita::all();
        return view('artikel', compact('company', 'sosmeds', 'beritas'));
    }

    public function detailBerita($id)
    {
        $berita = Berita::withoutGlobalScopes()->find($id);

        if (!$berita) {
            abort(404, 'Berita tidak ditemukan.');
        }
        
        $company = Company::first();
        $sosmeds = Sosmed::all();
        $otherBeritas = Berita::where('id', '!=', $berita->id)->latest()->take(3)->get();
        return view('detail-berita', compact('company', 'sosmeds', 'berita', 'otherBeritas'));
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
