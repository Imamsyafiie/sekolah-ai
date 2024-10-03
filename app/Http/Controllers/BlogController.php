<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Nilai;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Blog::with('nilai.siswa')->latest()->paginate(6);
        return view('blog.blog', compact('posts'));
    }
    public function show($id)
    {
        $blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $posts = Blog::findOrFail($id);
        $categories = \App\Models\Nilai::select('tema')->distinct()->get();
        // $categories = Category::get();

        return view('blog.single_blog', compact('posts', 'categories', 'blogs'));
    }
    public function category($tema)
    {
        // Mengambil semua blog yang memiliki tema tertentu
        $blogs = Blog::whereHas('nilai', function ($query) use ($tema) {
            $query->where('tema', $tema);
        })->get();

        return view('blog.category', compact('blogs', 'tema'));
    }
}
