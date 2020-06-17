<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Donasi;
use App\Donatur;

class HomeDonaturController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $get= Donatur::where('id_user', Auth::user()->id)->first();

        $total_donasi = DB::table('donasi')->sum('jumlah_donasi');
        $penerima = DB::table('penerima')->count();
        $donatur = DB::table('donatur')->count();
        $donasi = DB::table('donasi')->count();
        $donasi_perorang = Donasi::where('id_donatur', $get->id_donatur)->sum('jumlah_donasi');
        $data = array(
            'total_donasi' => $total_donasi,
            'penerima' => $penerima,
            'donatur' => $donatur,
            'donasi' => $donasi,
            'donasi_perorang' => $donasi_perorang,
        );

        return view('donatur.index', compact('data'));
    }
}
