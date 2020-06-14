<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Donasi;
use App\Category;
use App\Penerima;
use App\Donatur;
use DataTables;
use Validator;

class DonasiController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Donasi::latest()->get();
            return Datatables::of($data)
                ->editColumn('category', function($data){return $data->category->nama_kategori;})
                ->editColumn('penerima', function($data){return $data->penerima->nama;})
                ->editColumn('donatur', function($data){return $data->donatur->nama_depan.' '.$data->donatur->nama_belakang;})
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<button type="button" onclick="location.href =\''.route('pengurus.donasi.show', $row->id_donasi).'\'" class="detail btn btn-info btn-sm mr-1 detailBtn">Detail</button>';
                    $btn .= '<button type="button" data-id="/pengurus/donasi/'.$row->id_donasi.'/edit" class="edit btn btn-warning btn-sm mr-1 editBtn">Edit</button>';
                    $btn .= '<button type="submit" data-id="/pengurus/donasi/'.$row->id_donasi.'" class="btn btn-danger btn-sm deleteBtn">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pengurus.manage_donasi.index');
    }

    public function create(){
        // pake modal dialog
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required',
            'id_penerima' => 'required',
            'id_donatur' => 'required',
            'jumlah_donasi' => 'required|numeric',
            'tanggal_memberi' => 'required|date',
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }else {
            $donasi = new Donasi;
            $donasi->id_kategori = $request->id_kategori;
            $donasi->id_penerima = $request->id_penerima;
            $donasi->id_donatur = $request->id_donatur;
            $donasi->jumlah_donasi = $request->jumlah_donasi;
            $donasi->tanggal_memberi = $request->tanggal_memberi;
            $donasi->save();
            return response()->json(['success' => true]);
        }
    }

    public function show($id){
        $dataDonasi = Donasi::findOrFail($id);
        return view('pengurus.manage_donasi.detail', compact('dataDonasi'));
    }

    public function edit($id){
        $data = Donasi::findOrFail($id);
        return response()->json($data);
    }
    
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required',
            'id_penerima' => 'required',
            'id_donatur' => 'required',
            'jumlah_donasi' => 'required|numeric',
            'tanggal_memberi' => 'required|date',
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }else {
            $donasi = Donasi::find($id);
            $donasi->id_kategori = $request->id_kategori;
            $donasi->id_penerima = $request->id_penerima;
            $donasi->id_donatur = $request->id_donatur;
            $donasi->jumlah_donasi = $request->jumlah_donasi;
            $donasi->tanggal_memberi = $request->tanggal_memberi;
            $donasi->save();
            return response()->json(['success' => true]);
        }
    }

    public function destroy($id){
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

    // load data donatur 
    public function loadDataDonatur(Request $request){
        $data = Donatur::whereRaw("(nama_depan LIKE '%".$request->get('q')."%' 
                            OR nama_belakang LIKE '%".$request->get('q')."%' )")
                ->limit(30)
                ->get();
        return response()->json($data);
    }
}
