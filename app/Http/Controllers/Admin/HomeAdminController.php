<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class HomeAdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $total_donasi = DB::table('donasi')->sum('jumlah_donasi');
        $penerima = DB::table('penerima')->count();
        $donatur = DB::table('donatur')->count();
        $donasi = DB::table('donasi')->count();
        $riwayat = DB::table('donasi')
        ->join('penerima', 'donasi.id_penerima', '=', 'penerima.id_penerima')
        ->join('donatur', 'donasi.id_donatur', '=', 'donatur.id_donatur')
        ->select('jumlah_donasi', 'penerima.nama', 'donatur.nama_depan' )
        ->limit(10)
        ->orderBy('id_donasi', 'desc')
        ->get();
        $data = array(
            'total_donasi' => $total_donasi,
            'penerima' => $penerima,
            'donatur' => $donatur,
            'donasi' => $donasi,
            'riwayat' => $riwayat
        );

        return view('admin.index', compact('data'));
    }
}
