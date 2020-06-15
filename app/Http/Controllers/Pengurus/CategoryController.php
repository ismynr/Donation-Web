<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
            'gambar' => 'required|image|max:2048|mimes:jpeg,jpg,png,gif'
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }else {
            $category = new Category;
            $category->nama_kategori = $request->nama_kategori;

            if($request->file('gambar')){
                $image = $request->file('gambar');
                $new_name = date('Y-m-d-H:i:s') . '-' . rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads/category/photos/'), $new_name);

                $category->gambar = $new_name;
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

            if($request->file('gambar')){
                $image = $request->file('gambar');
                $new_name = date('Y-m-d-H:i:s') . '-' . rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads/category/photos/'), $new_name);

                $category->gambar = $new_name;
            }
            
            $category->save();
            return response()->json(['success' => true]);
        }
    }

    public function destroy($id){
        $data = Category::findOrFail($id);
        unlink(public_path('/uploads/category/photos/'.$data->gambar));
        if (Category::destroy($id)) {
            $data = 'Success';
        }else {
            $data = 'Failed';
        }
        return response()->json($data);
    }
}
