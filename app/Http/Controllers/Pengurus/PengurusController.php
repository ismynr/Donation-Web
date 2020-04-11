<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
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
                    $btn = '<button type="button" onclick="location.href =\' '.route('pengurus.show', $row->id_pengurus).' \'" class="detail btn btn-info btn-sm mr-1 detailBtn">Detail</button>';
                    $btn .= '<button type="button" data-id="/pengurus/pengurus/'.$row->id_pengurus.'/edit" class="edit btn btn-warning btn-sm mr-1 editBtn">Edit</button>';
                    $btn .= '<button type="submit" data-id="/pengurus/pengurus/'.$row->id_pengurus.'" class="btn btn-danger btn-sm deleteBtn">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pengurus.manage_pengurus.pengurus');
            
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Validate for form create
        $validator = Validator::make($request->all(), [
            'nip'       => 'required|numeric',
            'nama'      => 'required|min:2',
            'jabatan'   => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:3',
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }else {
            // Make User Login
            $users = new User;
            $users->name = $request->nama;
            $users->email = $request->email;
            $users->role = 'pengurus';
            $users->password = Hash::make($request->password);
            $users->save();

            // Make Data Pengurus
            $pengurus = new Pengurus;
            $pengurus->id_user = $users->id;
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
        return view('pengurus.manage_pengurus.detail', compact('data'));
    }

    public function edit($id)
    {
        $data = Pengurus::findOrFail($id);
        return response()->json($data);
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
            
            // Update juga nama pada tabel users
            $users = User::find($pengurus->id_user);
            $users->name = $request->nama;
            $users->save();
            return response()->json(['success' => true]);
        }
    }

    public function destroy($id)
    {
        $pengurus = Pengurus::find($id);
        if (Pengurus::destroy($id) && User::destroy($pengurus->id_user)) {
            $data = 'Success';
        }else {
            $data = 'Failed';
        }
        return response()->json($data);
    }
}
