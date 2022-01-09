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
        $attr = $request->all();
        if($request->file('sampul')){
            $attr['sampul'] = $request->file('sampul')->store('img');
        }
        Buku::create($attr);
        return redirect('/buku')->with('success','data berhasil dimasukan');
    }
    public function edit(Buku $buku)
    {
        
        return view('edit',[
            'buku' => $buku,
            'category' => Category::all(),
        ]);
    }
    public function update(Request $request,Buku $buku)
    {   
        $attr = $request->all();
        if($request->sampul == null){
            $attr['sampul'] = $request->oldsampul;
        }
        dd($attr);
    }
}
