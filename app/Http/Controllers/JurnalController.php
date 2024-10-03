<?php

namespace App\Http\Controllers;

use App\Models\jurnal;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function index()
    {
        // Mengambil semua data jurnal
        $jurnals = jurnal::orderBy('created_at', 'desc')->paginate(5);

        // Menampilkan data ke view 'jurnals.index' (buat view ini jika belum ada)
        return view('home.jurnal', compact('jurnals'));
    }
}
