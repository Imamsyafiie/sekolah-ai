<?php

namespace App\Http\Controllers;

use App\Models\AktivitasPembelajaran;
use App\Models\Guru;
use App\Models\kearifan;
use App\Models\Tema;
use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        // $gurus = Guru::with('user')->get(); // Ambil data guru dengan relasi user

        $totalUsers = User::count();
        $totalRolesGuru = User::role('guru')->count(); // Menghitung total user dengan role guru
        $totalRolesSiswa = User::role('siswa')->count(); // Menghitung total user dengan role siswa
        $totalAktivitas = AktivitasPembelajaran::count(); // Hitung total aktivitas pembelajaran
        // Mengambil semua data dari model SchoolProfile
        $tema = Tema::all();
        $kearifan = kearifan::all();
        // dd($tema);

        // $sections = [
        //     'Seni Budaya Nusantara' => $tema->where('section', 'Seni Budaya Nusantara')->first(),
        //     'Tokoh Lokal Nusantara' => $tema->where('section', 'Tokoh Lokal Nusantara')->first(),
        //     'Kuliner Khas Nusantara' => $tema->where('section', 'Kuliner Khas Nusantara')->first(),
        //     'Busana Tradisional Nusantara' => $tema->where('section', 'Busana Tradisional Nusantara')->first(),
        // ];

        // dd($sections);
        // Mengirim data ke view
        return view('home.about', compact('kearifan', 'tema', 'totalUsers', 'totalRolesGuru', 'totalRolesSiswa', 'totalAktivitas'));
    }
}
