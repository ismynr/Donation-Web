<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class ProfileAdminController extends Controller
{
    public function index()
    {
        $profile = User::findOrFail(Auth::user()->id);
        return view('admin.profile.profile', compact('profile'));
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
                'email' => 'required|max:255',
            ]);

            $user = User::findOrfail($id);
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->save();
            return redirect()->route('admin.profile.index')->withSuccess('Berhasil ubah profile!');

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
                return redirect()->route('admin.profile.index')->withSuccess('Berhasil ubah password!');
            } else{
                return redirect()->route('admin.profile.index')->withErrors('Password lama tidak sama!');
            }
        }
    }

    public function destroy($id)
    {
        //
    }
}
