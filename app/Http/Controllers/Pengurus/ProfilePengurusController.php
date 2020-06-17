<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Pengurus;
use Auth;

class ProfilePengurusController extends Controller
{
    public function index()
    {
        $profile = User::findOrFail(Auth::user()->id);
        $pengurus = Pengurus::where('id_user', Auth::user()->id)->first();
        return view('pengurus.profile.profile', compact('profile', 'pengurus'));
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
                'nama' => 'required|max:255',
                'nip' => 'required|max:255',
                'email'  => 'email|required|max:255|unique:users,email,'.Auth::user()->id,
                'jabatan' => 'required',
            ]);

            $get = Pengurus::where('id_user', Auth::user()->id)->first();
            $pengurus = Pengurus::findOrFail($get->id_pengurus);
            $pengurus->nama = $request->nama;
            $pengurus->nip = $request->nip;
            $pengurus->jabatan = $request->jabatan;
            $pengurus->save();

            $user = User::findOrfail($id);
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->save();
            return redirect()->route('pengurus.profile.index')->withSuccess('Berhasil ubah profile!');

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
                return redirect()->route('pengurus.profile.index')->withSuccess('Berhasil ubah password!');
            } else {
                return redirect()->route('pengurus.profile.index')->withErrors('Password lama tidak sama!');
            }
        }
    }

    public function destroy($id)
    {
        //
    }
}
