<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Ambil semua kategori beserta kuliner yang terkait
        $categories = Category::with('kuliner')->get();

        // Kirim data ke view
        return view('layout.menu', compact('categories'));
    }
}
