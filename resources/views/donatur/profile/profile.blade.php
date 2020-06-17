@extends('layouts.donatur.app')

@section('content')
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User Donatur</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
            </ol>
        </div>
    </div>
    
    
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <span class="alert-inner--text">{{ $error }}</span><br/>
                    @endforeach
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success">
                    <span class="alert-inner--text">{{session('success')}}</span>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card gradient-3">
                    <div class="card-body">
                        <div class="media align-items-center mb-4">
                            <img class="mr-3" src="{{ asset('quixlab') }}/images/user/form-user.png" width="80" height="80" alt="">
                            <div class="media-body">
                                <h3 class="mb-0 text-white">{{ Auth::user()->name }}</h3>
                                <p class="text-dark mb-0">{{ Auth::user()->role }}</p>
                            </div>
                        </div>
                        <ul class="card-profile__info">
                            <li><strong class="text-white mr-4">Email</strong> <span>{{ Auth::user()->email }}</span></li>
                            <li class="mb-1"><strong class="text-white mr-4">Dibuat Pada</strong> <span>{{ Auth::user()->created_at }}</span></li>
                            <li class="mb-1"><strong class="text-white mr-4">Terakhir Diubah</strong> <span>{{ Auth::user()->updated_at }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Change Password</h4>
                        <form class="form-valide" action="{{ route('donatur.profile.update', Auth::user()->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" name="type_change_profile" value="password">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="old_password">Password Lama<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="password">Password Baru<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="confirm_password">Confirm Passwords<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Ketik ulang password baru ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Change Profile</h4>
                        <form class="form-valide" action="{{ route('donatur.profile.update', Auth::user()->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" name="type_change_profile" value="profile">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nama_depan">Nama Depan<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Enter a nama.." value="{{ $donatur->nama_depan }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nama_belakang">Nama Belakang<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Enter a nama.." value="{{ $donatur->nama_belakang }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Your valid email.." value="{{ $donatur->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="no_hp">Nomor Handphone<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Enter a nama.." value="{{ $donatur->no_hp }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="alamat">Alamat<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="5">{{ $donatur->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="umur">Umur<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="number" class="form-control" id="umur" name="umur" placeholder="Enter a nama.." value="{{ $donatur->umur }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Change</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection