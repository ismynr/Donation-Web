
@extends('layouts.user.app')

@section('content')
<!-- row -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-danger">Maaf, Silahkan isi data diri anda untuk mendaftar sebagai <strong>Donatur</strong></div>
                    <form class="form-valide" action="{{ route('user.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nama_depan">Nama depan <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Enter a nama depan.." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nama_belakang">Nama Belakang<span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Enter a nama belakang .." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="no_hp">Handhphone <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Enter a nomor handphone.." required>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="alamat">Alamat <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" placeholder="Enter a alamat.."></textarea>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="umur">Umur <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="umur" name="umur" placeholder="Enter a umur.." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
@endsection