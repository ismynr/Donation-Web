<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penerima;
use App\Donasi;
use DataTables;
use Validator;

class PenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Penerima::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<button type="button" onclick="location.href =\''.route('penerima.show', $row->id_penerima).'\'" class="detail btn btn-info btn-sm mr-1 detailBtn">Detail</button>';
                    $btn .= '<button type="button" data-id="/pengurus/penerima/'.$row->id_penerima.'/edit" class="edit btn btn-warning btn-sm mr-1 editBtn">Edit</button>';
                    $btn .= '<button type="submit" data-id="/pengurus/penerima/'.$row->id_penerima.'" class="btn btn-danger btn-sm deleteBtn">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pengurus.manage_penerima.penerima');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'jenkel' => 'required',
            'umur' => 'required|numeric',
            'jumkel' => 'required|numeric',
            'penghasilan' => 'required|numeric',
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }else {
            $penerima = new Penerima;
            $penerima->nama = $request->nama;
            $penerima->alamat = $request->alamat;
            $penerima->tgl_lahir = $request->tgl_lahir;
            $penerima->jenkel = $request->jenkel;
            $penerima->umur = $request->umur;
            $penerima->jumkel = $request->jumkel;
            $penerima->penghasilan = $request->penghasilan;
            $penerima->save();
            return response()->json(['success' => true]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penerima = Penerima::where('id_penerima', $id)->get(); // Mengambil satu penerima.
        $donasi = Donasi::where('id_penerima', $id)->get();
        return view('pengurus.manage_penerima.penerima-detail', compact('penerima', 'donasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Penerima::findOrFail($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'jenkel' => 'required',
            'umur' => 'required|numeric',
            'jumkel' => 'required|numeric',
            'penghasilan' => 'required|numeric',
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }else {
            $penerima = Penerima::find($id);
            $penerima->nama = $request->nama;
            $penerima->alamat = $request->alamat;
            $penerima->tgl_lahir = $request->tgl_lahir;
            $penerima->jenkel = $request->jenkel;
            $penerima->umur = $request->umur;
            $penerima->jumkel = $request->jumkel;
            $penerima->penghasilan = $request->penghasilan;
            $penerima->save();
            return response()->json(['success' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Penerima::destroy($id)) {
            $data = 'Success';
        }else {
            $data = 'Failed';
        }
        return response()->json($data);
    }
}
