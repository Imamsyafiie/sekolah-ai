<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kuliner;
use Illuminate\Http\Request;

class KulinerController extends Controller
{
    public function index()
    {

        $kuliners = Kuliner::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('kuliner.index', compact('kuliners'));
    }
    public function show($id)
    {
        // Mengambil 3 kuliner terbaru
        $recentKuliners = Kuliner::orderBy('created_at', 'desc')->take(3)->get();

        // Mengambil kuliner berdasarkan ID, jika tidak ditemukan maka akan memberikan 404
        $kuliners = Kuliner::findOrFail($id);

        // Mengambil semua kategori
        $categories = Category::get();

        // Mengembalikan view dengan data kuliner, kategori, dan 3 kuliner terbaru
        return view('kuliner.show', compact('kuliners', 'categories', 'recentKuliners'));
    }
    public function category(Category $category)
    {
        $kuliners = Kuliner::where('category_id', $category->id)->get();
        return view('kuliner.category', compact('kuliners', 'category'));
    }
}
