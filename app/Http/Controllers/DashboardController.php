<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Survey;

class DashboardController extends Controller
{
    public function main()
    {
        $user = Auth::user();
        return view('admin.layouts.main', compact('user'));
    }

    public function dashboard()
    {
        $user = Auth::user();

        $jumlahLakiLaki = Survey::where('jenis_kelamin', 'L')->count();
        $jumlahPerempuan = Survey::where('jenis_kelamin', 'P')->count();

        $jumlahSD = Survey::where('pendidikan', 'SD')->count();
        $jumlahSMP = Survey::where('pendidikan', 'SMP')->count();
        $jumlahSMA = Survey::where('pendidikan', 'SMA')->count();
        $jumlahS1 = Survey::where('pendidikan', 'S1')->count();
        $jumlahS2 = Survey::where('pendidikan', 'S2')->count();
        $jumlahS3 = Survey::where('pendidikan', 'S3')->count();

        $jumlahPNS = Survey::where('pekerjaan', 'PNS')->count();
        $jumlahTNI = Survey::where('pekerjaan', 'TNI')->count();
        $jumlahPOLRI = Survey::where('pekerjaan', 'POLRI')->count();
        $jumlahSwasta = Survey::where('pekerjaan', 'SWASTA')->count();
        $jumlahWirausaha = Survey::where('pekerjaan', 'WIRAUSAHA')->count();
        // Untuk "Lainnya", kita harus menghitung yang tidak masuk kategori di atas atau
        // jika Anda menyimpan nilai 'LAINNYA' dan teks lainnya di kolom berbeda.
        // Asumsi: 'LAINNYA' disimpan sebagai value 'pekerjaan'.
        $jumlahLainnyaPekerjaan = Survey::where('pekerjaan', 'LAINNYA')->count();
        // Atau jika 'pekerjaan_lainnya' terisi tapi 'pekerjaan' kosong/null, Anda perlu logika yang lebih spesifik.
        // Contoh lebih akurat jika 'pekerjaan' bisa 'LAINNYA' atau pekerjaan_lainnya diisi saat 'LAINNYA' dipilih:
        // $jumlahLainnyaPekerjaan = Survey::whereNotNull('pekerjaan_lainnya')
        //                               ->whereNotIn('pekerjaan', ['PNS', 'TNI', 'POLRI', 'SWASTA', 'WIRAUSAHA'])
        //                               ->count();


        return view('admin.dashboard', compact(
            'jumlahLakiLaki',
            'jumlahPerempuan',
            'jumlahSD',
            'jumlahSMP',
            'jumlahSMA',
            'jumlahS1',
            'jumlahS2',
            'jumlahS3',
            'jumlahPNS',
            'jumlahTNI',
            'jumlahPOLRI',
            'jumlahSwasta',
            'jumlahWirausaha',
            'jumlahLainnyaPekerjaan',
            'user'
        ));
    }
}
