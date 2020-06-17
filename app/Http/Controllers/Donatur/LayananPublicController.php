<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LayananPublic;
use App\Donatur;
use Auth;

class LayananPublicController extends Controller
{
    public function index()
    {
        $donatur= Donatur::where('id_user', Auth::user()->id)->first();
        
        $lp = LayananPublic::latest()->where('id_donatur', $donatur->id_donatur)->paginate(15);
        $jumlah_unread = LayananPublic::where(['id_donatur' => $donatur->id_donatur])->count();
        return view('donatur.layanan_public.layanan', compact('lp', 'jumlah_unread'));
    }

    public function create()
    {
        $donatur= Donatur::where('id_user', Auth::user()->id)->first();
        $jumlah_unread = LayananPublic::where(['read' => 0, 'id_donatur' => $donatur->id_donatur])->count();
        return view('donatur.layanan_public.compose', compact('jumlah_unread'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'pesan' => 'required',
        ]);
        $donatur = Donatur::where('id_user', Auth::user()->id)->first();

        $lp = new LayananPublic();
        $lp->id_donatur = $donatur->id_donatur;
        $lp->subject = str_replace('Reply - ', '', $request->subject);
        $lp->nama = $donatur->nama_depan . ' ' . $donatur->nama_belakang;
        $lp->email = Auth::user()->email;
        $lp->pesan = $request->pesan;
        $lp->save(); 

        return redirect()->route('donatur.layanan_public.index')->withSuccess('Berhasil dikirim!');
    }

    public function show($id)
    {
        $layananpublic = LayananPublic::findOrFail($id); 
        if($layananpublic->id_pengurus != null){
            $layananpublic->read = 1;
            $layananpublic->save(); 
        }
        $jumlah_unread = LayananPublic::where(['read' => 0, 'id_pengurus' => !NULL])->count();
        return view('donatur.layanan_public.reply', compact('layananpublic', 'jumlah_unread'));
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
