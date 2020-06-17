@extends('layouts.pengurus.app')

@section('content')
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User Pengurus</a></li>
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
                <div class="card gradient-9">
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
                        <form class="form-valide" action="{{ route('pengurus.profile.update', Auth::user()->id) }}" method="post">
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
                        <form class="form-valide" action="{{ route('pengurus.profile.update', Auth::user()->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" name="type_change_profile" value="profile">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nama">Nama<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter a nama.." value="{{ $pengurus->nama }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nip">NIP <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="number" class="form-control" id="nip" name="nip" placeholder="Your valid nip.." value="{{ $pengurus->nip }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="jabatan">Jabatan<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Enter a jabatan.." value="{{ $pengurus->jabatan }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Your valid email.." value="{{ $profile->email }}">
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