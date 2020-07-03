<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Donasi;
use DataTables;
use App\Category;
use App\Penerima;
use App\Donatur;
use Auth;
use Validator;

class ManageDonasiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // AMBIL ID DONATUR LEWAT USER ID
            $get= Donatur::where('id_user', Auth::user()->id)->first();

            $data = Donasi::latest()->where('id_donatur', $get->id_donatur);
            return Datatables::of($data)
                ->editColumn('category', function($data){return $data->category->nama_kategori;})
                ->editColumn('penerima', function($data){return $data->penerima->nama;})
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<button type="button" onclick="location.href =\''.route('donatur.donasi.show', $row->id_donasi).'\'" class="detail btn btn-info btn-sm mr-1 detailBtn">Detail</button>';
                    $btn .= '<button type="button" data-id="/donatur/donasi/'.$row->id_donasi.'/edit" class="edit btn btn-warning btn-sm mr-1 editBtn">Edit</button>';
                    $btn .= '<button type="submit" data-id="/donatur/donasi/'.$row->id_donasi.'" class="btn btn-danger btn-sm deleteBtn">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('donatur.own_manage_donasi.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required',
            'id_penerima' => 'required',
            'jumlah_donasi' => 'required|numeric',
            'tanggal_memberi' => 'required|date',
            'gambar' => 'image|max:2048|mimes:jpeg,jpg,png,gif'
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }else {
            // AMBIL ID DONATUR LEWAT USER ID
            $get= Donatur::where('id_user', Auth::user()->id)->first();

            $donasi = new Donasi;
            $donasi->id_kategori = $request->id_kategori;
            $donasi->id_penerima = $request->id_penerima;
            $donasi->id_donatur = $get->id_donatur;
            $donasi->jumlah_donasi = $request->jumlah_donasi;
            $donasi->tanggal_memberi = $request->tanggal_memberi;

            if($image = $request->file('gambar')){
                $new_name = Storage::putFile('public/donasi/photos', $image);
                $donasi->gambar = basename($new_name);
            }

            $donasi->save();
            return response()->json(['success' => true]);
        }
    }

    public function show($id)
    {
        $dataDonasi = Donasi::findOrFail($id);
        return view('donatur.own_manage_donasi.detail', compact('dataDonasi'));
    }

    public function edit($id)
    {
        $data = Donasi::findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required',
            'id_penerima' => 'required',
            'jumlah_donasi' => 'required|numeric',
            'tanggal_memberi' => 'required|date',
            'gambar' => 'image|max:2048|mimes:jpeg,jpg,png,gif'
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }else {
            // AMBIL ID DONATUR LEWAT USER ID
            $get= Donatur::where('id_user', Auth::user()->id)->first();

            $donasi = Donasi::find($id);
            $donasi->id_kategori = $request->id_kategori;
            $donasi->id_penerima = $request->id_penerima;
            $donasi->id_donatur = $get->id_donatur;
            $donasi->jumlah_donasi = $request->jumlah_donasi;
            $donasi->tanggal_memberi = $request->tanggal_memberi;

            if($image = $request->file('gambar')){
                $new_name = Storage::putFile('public/donasi/photos', $image);

                if($donasi->gambar != NULL){
                    Storage::delete('public/donasi/photos/'.$donasi->gambar);
                }

                $donasi->gambar = basename($new_name);
            }

            $donasi->save();
            return response()->json(['success' => true]);
        }
    }

    public function destroy($id)
    {
        $data = Donasi::findOrFail($id);

        // KALO PDF Y BELUM DIAPLOD
        if(Storage::exists('public/donasi/photos/'.$data->gambar) == 1){
            Storage::delete('public/donasi/photos/'.$data->gambar);
        }

        if (Donasi::destroy($id)) {
            $data = 'Success';
        }else {
            $data = 'Failed';
        }
        return response()->json($data);
    }

    /**
     * 
     * JSON AUTOCOMPLETE COMBOBOX
     * 
     */
    // load data category 
    public function loadDataCategory(Request $request){
        $data = Category::whereRaw("(nama_kategori LIKE '%".$request->get('q')."%')")
                ->limit(30)
                ->get();
        return response()->json($data);
    }

    // load data penerima 
    public function loadDataPenerima(Request $request){
        $data = Penerima::whereRaw("(nama LIKE '%".$request->get('q')."%')")
                ->limit(30)
                ->get();
        return response()->json($data);
    }
}
