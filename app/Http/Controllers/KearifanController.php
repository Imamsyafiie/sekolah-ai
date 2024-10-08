<?php

namespace App\Http\Controllers;

use App\Models\kearifan;
use Illuminate\Http\Request;

class KearifanController extends Controller
{
    public function index()
    {
        $kearifan = kearifan::all();

        return view('kearifan.index', compact('kearifan'));
    }
}
