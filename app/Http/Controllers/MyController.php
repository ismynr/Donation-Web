<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            ['nope' => '0875 1970 5696', 'nama' => 'Diah Lailasari', 'kota' => 'Jakarta', 'kelas' => '6A'],
            ['nope' => '341 3249 481', 'nama' => 'Faizah Ayu Yulianti', 'kota' => 'Surabaya', 'kelas' => '6B'],
            ['nope' => '0680 4498 620', 'nama' => 'Kambali Simanjuntak', 'kota' => 'Tegal', 'kelas' => '6C'],
            ['nope' => '0458 3514 961', 'nama' => 'Raditya Saiful Sihotang', 'kota' => 'Tegal', 'kelas' => '6D'],
            ['nope' => '0481 5065 007', 'nama' => 'Restu Winarsih', 'kota' => 'Pekalongan', 'kelas' => '6C'],
            ['nope' => '0938 3116 8740', 'nama' => 'Pardi Suwarno', 'kota' => 'Semarang', 'kelas' => '6B'],
        ];

        if($request->query('kelas')){
            $data = array_filter($data, function($kelas){
                return $kelas['kelas'] == request()->kelas;
            });
            return view('data.data', compact('data'));
        }
        else if($request->query('nope')){
            $data = array_filter($data, function($nope){
                return $nope['nope'] == request()->nope;
            });
            return view('data.data-detail', compact('data'));
        }

        return view('data.data', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // sudah pakai modal dialog
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('data.index')->with('alert-success','Berhasil Tambah Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kelas)
    {
        $data = [
            ['nope' => '0875 1970 5696', 'nama' => 'Diah Lailasari', 'kota' => 'Jakarta', 'kelas' => '6A'],
            ['nope' => '341 3249 481', 'nama' => 'Faizah Ayu Yulianti', 'kota' => 'Surabaya', 'kelas' => '6B'],
            ['nope' => '0680 4498 620', 'nama' => 'Kambali Simanjuntak', 'kota' => 'Tegal', 'kelas' => '6C'],
            ['nope' => '0458 3514 961', 'nama' => 'Raditya Saiful Sihotang', 'kota' => 'Tegal', 'kelas' => '6D'],
            ['nope' => '0481 5065 007', 'nama' => 'Restu Winarsih', 'kota' => 'Pekalongan', 'kelas' => '6C'],
            ['nope' => '0938 3116 8740', 'nama' => 'Pardi Suwarno', 'kota' => 'Semarang', 'kelas' => '6B'],
        ];

        
        if($kelas){
            $data = array_filter($data, function($kelas){
                return $kelas['kelas'] == request()->segment(count(request()->segments()));
            });
        }
        return view('data.data', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //sudah pakai modal dialog
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
        return redirect()->route('data.index')->with('alert-success','Berhasil Ubah Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('data.index')->with('alert-success','Data berhasi dihapus!');
    }
}
