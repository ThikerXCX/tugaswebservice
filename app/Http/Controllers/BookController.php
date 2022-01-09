<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Buku;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('buku',compact("buku"));
    }
    //
    public function viewSampul(Buku $buku)
    {
        return response()->json(['buku'=>$buku]);
    }
    //
    public function create()
    {
        $category = Category::all();
        return view('form',compact('category'));
    }
    //
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Buku::class,'slug',$request->judul);
        return response()->json(['slug'=>$slug]);
    }
    ///
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
        $rules = [
            'judul' => ['required'],
            'penulis' => ['required'],
            'penerbit' => ['required'],
            'sampul' => ['image'],
        ];
        if ($request->slug != $buku->slug) {
            $rules['slug'] = 'required|unique:bukus'; 
        }
        $attr = $request->validate($rules);
        if($request->file('sampul')){
            if ($request->oldsampul) {
                Storage::delete($request->oldsampul);
            }
            $attr['sampul'] = $request->file('sampul')->store('img');
        }
        Buku::where('id',$buku->id)->update($attr);
        return redirect('/buku')->with('success','data berhasil diupdate');
    }
    public function destroy(Buku $buku)
    {
        if($buku->sampul){
            Storage::delete($buku->sampul);
        }
        Buku::destroy($buku->id);
        return redirect('/buku')->with('success','data berhasil dihapus');
    }
}
