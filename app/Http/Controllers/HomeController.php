<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home',[
            'buku' => Buku::all()
        ]);
    }
    public function show(Buku $buku)
    {
        return response()->json(['buku'=>$buku,'cat'=>$buku->category->name]);
    }
}
