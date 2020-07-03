<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use DataTables;
use Validator;

class CategoryController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Category::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<button type="button" data-id="/pengurus/category/'.$row->id_kategori.'/edit" class="edit btn btn-warning btn-sm mr-1 editBtn">Edit</button>';
                    $btn .= '<button type="submit" data-id="/pengurus/category/'.$row->id_kategori.'" class="btn btn-danger btn-sm deleteBtn">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pengurus.manage_category.index');
    }

    public function create(){
        // pake modal dialog
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|max:255',
            'gambar' => 'required|image|max:2048|mimes:jpeg,jpg,png,gif',
            'pdf' => 'max:2048|mimes:pdf',
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }else {
            $category = new Category;
            $category->nama_kategori = $request->nama_kategori;

            if($pdf = $request->file('pdf')){
                $new_name = Storage::putFile('public/category/pdf', $pdf); 
                $category->pdf = basename($new_name);
            }

            if($image = $request->file('gambar')){
                $new_name = Storage::putFile('public/category/photos', $image); 
                $category->gambar = basename($new_name);
            }

            $category->save();
            return response()->json(['success' => true]);
        }
    }

    public function show($id){
        // tidak ditampilkan
    }

    public function edit($id){
        $data = Category::findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|max:255',
            'gambar' => 'image|max:2048|mimes:jpeg,jpg,png,gif'
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }else {
            $category = Category::find($id);
            $category->nama_kategori = $request->nama_kategori;

            if($image = $request->file('gambar')){
                $new_name = Storage::putFile('public/category/photos', $image); 
                if($category->gambar != NULL){
                    Storage::delete('public/category/photos/'.$category->gambar);
                }
                $category->gambar = basename($new_name);
            }

            if($pdf = $request->file('pdf')){
                $new_name = Storage::putFile('public/category/pdf', $pdf);
                if($category->pdf != NULL){
                    Storage::delete('public/category/photos/'.$category->pdf);
                }
                $category->pdf = basename($new_name);
            }
            
            $category->save();
            return response()->json(['success' => true]);
        }
    }

    public function destroy($id){
        $data = Category::findOrFail($id);
        if(Storage::exists('public/category/photos/'.$data->gambar) == 1){
            Storage::delete('public/category/photos/'.$data->gambar);
        }

        if(Storage::exists('public/category/pdf/'.$data->pdf) == 1){
            Storage::delete('public/category/pdf/'.$data->pdf);
        }

        if (Category::destroy($id)) {
            $data = 'Success';
        }else {
            $data = 'Failed';
        }
        return response()->json($data);
    }
}
