<?php

namespace App\Http\Controllers;

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
        return view('usr_pengurus.category.index');
    }

    public function create(){
        // pake modal dialog
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|max:255',
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }else {
            $category = new Category;
            $category->nama_kategori = $request->nama_kategori;
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
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }else {
            $category = Category::find($id);
            $category->nama_kategori = $request->nama_kategori;
            $category->save();
            return response()->json(['success' => true]);
        }
    }

    public function destroy($id){
        if (Category::destroy($id)) {
            $data = 'Success';
        }else {
            $data = 'Failed';
        }
        return response()->json($data);
    }
}
