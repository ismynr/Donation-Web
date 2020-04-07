<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Pengurus;
use App\User;
use DataTables;
use Validator;


class PengurusController extends Controller
{

    public function index(Request $request)
{
    if ($request->ajax()) {
        $data = Pengurus::latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<button type="button" onclick="location.href =\''.route('pengurus.show', $row->id_pengurus).'\'" class="detail btn btn-info btn-sm mr-1 detailBtn">Detail</button>';
                $btn .= '<button type="button" data-id="/pengurus/pengurus/'.$row->id_pengurus.'/edit" class="edit btn btn-warning btn-sm mr-1 editBtn">Edit</button>';
                $btn .= '<button type="submit" data-id="/pengurus/peengurus/'.$row->id_pengurus.'" class="btn btn-danger btn-sm deleteBtn">Delete</button>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    return view('usr_pengurus.pengurus.pengurus');
        
 }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $pengurusCreate = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'role' => 'pengurus',
            'password' => Hash::make($request->password),
        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }else {

        $pengurus = new Pengurus;
        $pengurus->id_user = $pengurusCreate->id;
        $pengurus->nip = $request->nip;
        $pengurus->nama = $request->nama;
        $pengurus->jabatan = $request->jabatan;
        $pengurus->save();

        return response()->json(['success' => true]);
        }
    }
    public function show($id)
    {
        $data = Pengurus::find($id)->get(); // Mengambil satu Pengurus
        return view('usr_pengurus.pengurus.detail', compact('data'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }else {
            $pengurus = Pengurus::find($id);
            $pengurus->nip = $request->nip;
            $pengurus->nama = $request->nama;
            $pengurus->jabatan = $request->jabatan;
            $pengurus->save();
            return response()->json(['success' => true]);
        }
    }

    public function destroy($id)
    {
        if (Pengurus::destroy($id)) {
            $data = 'Success';
        }else {
            $data = 'Failed';
        }
        return response()->json($data);
    }
}
