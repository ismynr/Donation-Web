<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::All();
        return view('category.index', compact('category'));
    }

    public function create(){
        // pake modal dialog
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama_kategori' => 'required',
        ]);
        Category::create($data);
        return redirect()->route('category.index')->with('message', 'Data anda telah diinputkan!');
    }

    public function show($id){
        // tidak ditampilkan
    }

    public function edit($id){
        // pake modal dialog
    }

    public function update(Request $request, $id){
        $data = $request->validate([
            'nama_kategori' => 'required',
        ]);
        Category::where('id_kategori', $id)->update($data);
        return redirect()->route('category.index')->with('message', 'Data anda telah diupdate!');
    }

    public function destroy($id){
        $data = Category::findOrFail($id);
        $data->delete();
        return redirect()->route('category.index')->with('message', 'Data anda telah dihapus!');
    }
}
