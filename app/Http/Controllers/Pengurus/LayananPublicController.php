<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\LayananPublic;
use App\Pengurus;
use Auth;

class LayananPublicController extends Controller
{
    public function index(Request $request)
    {
        $pengurus= Pengurus::where('id_user', Auth::user()->id)->first();
        
        if($request->input('sent') == 'true'){
            $lp = LayananPublic::latest()->where('id_pengurus', $pengurus->id_pengurus)->paginate(15);
        } else {
            $lp = LayananPublic::latest()->where('id_pengurus', NULL)->paginate(15);
        }
        $jumlah_unread = LayananPublic::where('read', 0)->count();
        return view('pengurus.layanan_public.layanan', compact('lp', 'jumlah_unread'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'pesan' => 'required',
        ]);
        $pengurus= Pengurus::where('id_user', Auth::user()->id)->first();

        $lp = new LayananPublic();
        $lp->id_pengurus = $pengurus->id_pengurus;
        $lp->id_donatur = $request->id_donatur;
        $lp->subject = 'Reply - '.$request->subject;
        $lp->nama = $pengurus->nama;
        $lp->email = Auth::user()->email;
        $lp->pesan = $request->pesan;
        $lp->save(); 

        // UPDATE PESAN SEBELUMNYA MENJADI SUDAH DI BALAS / REPLY
        $lpupdate = LayananPublic::findOrFail($request->id);
        $lpupdate->reply = 1;
        $lpupdate->save();

        return redirect()->route('pengurus.layanan_public.index')->withSuccess('Berhasil dikirim!');
    }
    

    public function show($id)
    {
        $layananpublic = LayananPublic::findOrFail($id);
        $lp = LayananPublic::where('id_donatur', $layananpublic->id_donatur)->get();
        
        if($layananpublic->id_pengurus == null){
            $layananpublic->read = 1;
            $layananpublic->save(); 
        }
        $jumlah_unread = DB::table('layanan_publics')->where('read', 0)->count();
        return view('pengurus.layanan_public.reply', compact('layananpublic', 'jumlah_unread', 'lp'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
