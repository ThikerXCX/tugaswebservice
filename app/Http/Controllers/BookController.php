<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Buku;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('buku',compact("buku"));
    }
    public function viewSampul(Buku $buku)
    {
        return response()->json(['buku'=>$buku]);
    }
    public function create()
    {
        $category = Category::all();
        return view('form',compact('category'));
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Buku::class,'slug',$request->judul);
        return response()->json(['slug'=>$slug]);
    }
    public function store(BookRequest $request)
    {
        echo 'as';
    }
}
