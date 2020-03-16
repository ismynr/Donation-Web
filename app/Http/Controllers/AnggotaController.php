<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            ['id' => '1', 'nama' => 'Diah Lailasari', 'alamat' => 'Tegal', 'jabatan' => 'ketua'],
            ['id' => '2', 'nama' => 'Faizah Ayu Yulianti', 'alamat' => 'Tegal', 'jabatan' => 'anggota'],
            ['id' => '3', 'nama' => 'Kambali Simanjuntak', 'alamat' => 'Tegal', 'jabatan' => 'wakil I'],
            ['id' => '4', 'nama' => 'Raditya Saiful Sihotang', 'alamat' => 'Tegal', 'jabatan' => 'wakil II'],
            ['id' => '5', 'nama' => 'Restu Winarsih', 'alamat' => 'Brebes', 'jabatan' => 'anggota'],
            ['id' => '6', 'nama' => 'Pardi Suwarno', 'alamat' => 'Pemalang', 'jabatan' => 'manajemen uang'],
        ];

        if($request->query('id')){
            $data = array_filter($data, function($id){
                return $id['id'] == request()->id;
            });
            return view('anggota.anggota-detail', compact('data'));
        }

        return view('anggota.anggota', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // sudah pakai modal dialog (jdi tidak usah dibuatkan halaman)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('anggota.index')->with('alert-success','Berhasil Tambah Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            ['id' => '1', 'nama' => 'Diah Lailasari', 'alamat' => 'Tegal', 'jabatan' => 'ketua'],
            ['id' => '2', 'nama' => 'Faizah Ayu Yulianti', 'alamat' => 'Tegal', 'jabatan' => 'anggota'],
            ['id' => '3', 'nama' => 'Kambali Simanjuntak', 'alamat' => 'Tegal', 'jabatan' => 'wakil I'],
            ['id' => '4', 'nama' => 'Raditya Saiful Sihotang', 'alamat' => 'Tegal', 'jabatan' => 'wakil II'],
            ['id' => '5', 'nama' => 'Restu Winarsih', 'alamat' => 'Brebes', 'jabatan' => 'anggota'],
            ['id' => '6', 'nama' => 'Pardi Suwarno', 'alamat' => 'Pemalang', 'jabatan' => 'manajemen uang'],
        ];

        if($kelas){
            $data = array_filter($data, function($id){
                return $id['id'] == request()->segment(count(request()->segments()));
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
        // sudah pakai modal dialog (jdi tidak usah dibuatkan halaman)
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
        return redirect()->route('anggota.index')->with('alert-success','Berhasil Ubah Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('anggota.index')->with('alert-success','Data berhasi dihapus!');
    }
}
