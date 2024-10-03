<?php

namespace App\Http\Controllers;

use App\Models\mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        // Mengambil semua data mitra
        $mitras = mitra::all();

        // Mengirim data mitra ke view
        return view('home.jurnal', compact('mitras'));
    }
}
