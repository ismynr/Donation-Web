<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Donatur;
use Auth;

class ProfileDonaturController extends Controller
{
    public function index()
    {
        $profile = User::findOrFail(Auth::user()->id);
        $donatur = Donatur::where('id_user', Auth::user()->id)->first();
        return view('donatur.profile.profile', compact('profile', 'donatur'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        if($request->type_change_profile == "profile"){
            $this->validate($request, [
                'nama_depan' => 'required|max:255',
                'nama_belakang' => 'required|max:255',
                'email'  => 'email|required|max:255|unique:users,email,'.Auth::user()->id,
                'no_hp' => 'required|min:10',
                'alamat' => 'required',
                'umur' => 'required',
            ]);

            $get = Donatur::where('id_user', Auth::user()->id)->first();
            $donatur = Donatur::findOrFail($get->id_donatur);
            $donatur->nama_depan = $request->nama_depan;
            $donatur->nama_belakang = $request->nama_belakang;
            $donatur->email = $request->email;
            $donatur->no_hp = $request->no_hp;
            $donatur->alamat = $request->alamat;
            $donatur->umur = $request->umur;
            $donatur->save();

            $user = User::findOrfail($id);
            $user->name = $request->nama_depan . ' ' . $request->nama_belakang;
            $user->email = $request->email;
            $user->save();
            return redirect()->route('donatur.profile.index')->withSuccess('Berhasil ubah profile!');

        } else{
            $this->validate($request, [
                'old_password' => 'required|max:255',
                'password' => 'required|max:255',
                'confirm_password' => 'required|max:255|same:password',
            ]);

            if(Hash::check($request->old_password, Auth::user()->password)){
                $user = User::findOrfail($id);
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->route('donatur.profile.index')->withSuccess('Berhasil ubah password!');
            }
            else if (Hash::check("dummy", Auth::user()->password)){ 
                //JIKA BELUM UBAH PASSWORD SAMA SEKALI KETIKA LOGIN/REG PAKE SOCIALITE
                $user = User::findOrfail($id);
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->route('donatur.profile.index')->withSuccess('Berhasil ubah password!');
            }
            else {
                return redirect()->route('donatur.profile.index')->withErrors('Password lama tidak sama!');
            }
        }
    }

    public function destroy($id)
    {
        //
    }
}
