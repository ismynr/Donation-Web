@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center align-self-center">
        <div class="card" style="background:#eee; width: 400px">
            <div class="m-3">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('donatur.update', $donaturs->id_donatur) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    
                    <div class="form-group">
                        <label for="">Masukan Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $donaturs->email }}">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ $donaturs->username }}">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control" value="{{ $donaturs->nama_depan }}">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Belakang</label>
                        <input type="text" name="nama_belakang" class="form-control" value="{{ $donaturs->nama_belakang }}">
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Handphone</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ $donaturs->no_hp }}">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id_user="" cols="30" rows="10" class="form-control"> {{ $donaturs->alamat }} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Umur</label>
                        <input type="text" name="umur" class="form-control" value="{{ $donaturs->umur }}">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-primary float-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
