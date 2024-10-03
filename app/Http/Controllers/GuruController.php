<?php

namespace App\Http\Controllers;

use App\Models\AktivitasPembelajaran;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Guru;
use App\Models\mitra;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $mitras = mitra::all();
        $blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        // Ambil semua data guru
        $gurus = Guru::with('user')->get(); // Ambil data guru dengan relasi user

        $totalUsers = User::count();
        $totalRolesGuru = User::role('guru')->count(); // Menghitung total user dengan role guru
        $totalRolesSiswa = User::role('siswa')->count(); // Menghitung total user dengan role siswa
        $totalAktivitas = AktivitasPembelajaran::count(); // Hitung total aktivitas pembelajaran
        // Ambil data acara
        $events = Event::all()->map(function ($event) {
            return [
                'title' => $event->title,
                'start' => $event->starts_at,
                'end' => $event->ends_at,
            ];
        });

        return view('home.index', compact('events', 'mitras', 'gurus', 'totalUsers', 'totalRolesGuru', 'totalRolesSiswa', 'totalAktivitas', 'blogs'));
    }
}
