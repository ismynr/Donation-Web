<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
                    $btn = '<button type="button" onclick="location.href =\''.route('pengurus.penerima.show', $row->id_penerima).'\'" class="detail btn btn-info btn-sm mr-1 detailBtn">Detail</button>';
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
            'pdf' => 'max:2048|mimes:pdf',
            'gambar' => 'required|image|max:2048|mimes:jpeg,jpg,png,gif',
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

            if($pdf = $request->file('pdf')){
                $new_name = Storage::putFile('public/penerima/pdf', $pdf); 
                $penerima->pdf = basename($new_name);
            }

            if($image = $request->file('gambar')){
                $new_name = Storage::putFile('public/penerima/photos', $image); 
                $penerima->gambar = basename($new_name);
            }

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
            'pdf' => 'max:2048|mimes:pdf',
            'gambar' => 'image|max:2048|mimes:jpeg,jpg,png,gif'
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
            if($pdf = $request->file('pdf')){
                // KALO UPLOAD PDF LAGI
                $new_name = Storage::putFile('public/penerima/pdf', $pdf);

                // FILE PDF SEBELUMNYA DI HAPUS
                if($penerima->pdf != NULL){
                    Storage::delete('public/penerima/pdf/'.$penerima->pdf);
                }

                $penerima->pdf = basename($new_name);
            }
            if($image = $request->file('gambar')){
                $new_name = Storage::putFile('public/penerima/photos', $image);

                if($penerima->gambar != NULL){
                    Storage::delete('public/penerima/photos/'.$penerima->gambar);
                }

                $penerima->gambar = basename($new_name);
            }
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
        $data = Penerima::findOrFail($id);
        if(Storage::exists('public/penerima/pdf/'.$data->pdf) == 1){
            Storage::delete('public/penerima/pdf/'.$data->pdf);
        }

        if(Storage::exists('public/penerima/photos/'.$data->gambar) == 1){
            Storage::delete('public/penerima/photos/'.$data->gambar);
        }


        if (Penerima::destroy($id)) {
            $data = 'Success';
        }else {
            $data = 'Failed';
        }
        return response()->json($data);
    }
}
