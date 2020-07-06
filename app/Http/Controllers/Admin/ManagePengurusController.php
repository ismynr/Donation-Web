<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Pengurus;
use App\User;
use DataTables;
use Validator;

class ManagePengurusController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pengurus::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<button type="button" onclick="location.href =\' '.route('admin.pengurus.show', $row->id_pengurus).' \'" class="detail btn btn-info btn-sm mr-1 detailBtn">Detail</button>';
                    $btn .= '<button type="button" data-id="/admin/pengurus/'.$row->id_pengurus.'/edit" class="edit btn btn-warning btn-sm mr-1 editBtn">Edit</button>';
                    $btn .= '<button type="submit" data-id="/admin/pengurus/'.$row->id_pengurus.'" class="btn btn-danger btn-sm deleteBtn">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.manage_pengurus.pengurus');
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
            'pdf' => 'max:2048|mimes:pdf',
            'gambar' => 'image|max:2048|mimes:jpeg,jpg,png,gif',
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }else {
            // Make User Login
            $users = new User;
            $users->name = $request->nama;
            $users->email = $request->email;
            $users->role = 'pengurus';
            $users->password = Hash::make($request->email);
            $users->save();

            // Make Data Pengurus
            $pengurus = new Pengurus;
            $pengurus->id_user = $users->id;
            $pengurus->nip = $request->nip;
            $pengurus->nama = $request->nama;
            $pengurus->jabatan = $request->jabatan;

            if($pdf = $request->file('pdf')){
                $new_name = Storage::putFile('public/pengurus/pdf', $pdf); 
                $pengurus->pdf = basename($new_name);
            }

            if($image = $request->file('gambar')){
                $new_name = Storage::putFile('public/pengurus/photos', $image); 
                $pengurus->gambar = basename($new_name);
            }
            $pengurus->save();

            return response()->json(['success' => true]);
        }
    }

    public function show($id)
    {
        $data = Pengurus::findOrFail($id); // Mengambil satu Pengurus
        return view('admin.manage_pengurus.detail', compact('data'));
    }

    public function edit($id)
    {
        $data = Pengurus::findOrFail($id);
        $user = User::findOrFail($data->id_user);
        return response()->json(['data' => $data, 'user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $get = Pengurus::where('id_pengurus', $id)->first();

        $validator = Validator::make($request->all(), [
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'pdf' => 'max:2048|mimes:pdf',
            'gambar' => 'image|max:2048|mimes:jpeg,jpg,png,gif',
            'email' => 'email|required|max:255|unique:users,email,'. $get->id_user
            
        ]);
        
        if($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }else {
            $pengurus = Pengurus::find($id);
            $pengurus->nip = $request->nip;
            $pengurus->nama = $request->nama;
            $pengurus->jabatan = $request->jabatan;

            if($pdf = $request->file('pdf')){
                // KALO UPLOAD PDF LAGI
                $new_name = Storage::putFile('public/pengurus/pdf', $pdf);

                // FILE PDF SEBELUMNYA DI HAPUS
                if($pengurus->pdf != NULL){
                    Storage::delete('public/pengurus/pdf/'.$pengurus->pdf);
                }

                $pengurus->pdf = basename($new_name);
            }
            if($image = $request->file('gambar')){
                $new_name = Storage::putFile('public/pengurus/photos', $image);

                if($pengurus->gambar != NULL){
                    Storage::delete('public/pengurus/photos/'.$pengurus->gambar);
                }

                $pengurus->gambar = basename($new_name);
            }
            $pengurus->save();
            
            // UPDATE JUGA USER ACCOUNT PADA TABEL USER
            $users = User::find($pengurus->id_user);
            $users->name = $request->nama;
            $users->email = $request->email;
            if($request->password == "Reset Password"){
                $donatur->password = Hash::make($request->email);
            }
            $users->save();
            return response()->json(['success' => true]);
        }
    }

    public function destroy($id)
    {
        $pengurus = Pengurus::find($id);
        if(Storage::exists('public/pengurus/pdf/'.$pengurus->pdf) == 1){
            Storage::delete('public/pengurus/pdf/'.$pengurus->pdf);
        }

        if(Storage::exists('public/pengurus/photos/'.$pengurus->gambar) == 1){
            Storage::delete('public/pengurus/photos/'.$pengurus->gambar);
        }

        if (Pengurus::destroy($id)) {
            $data = 'Success';
        }else {
            $data = 'Failed';
        }
        return response()->json($data);
    }
}
