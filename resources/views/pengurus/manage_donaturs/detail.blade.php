@extends('layouts.pengurus.app')
@section('content')
<div class="ml-3 mb-3">
<button type="button" class="btn ml-1 mr-1 btn-info text-white" onclick="location.href ='javascript:history.go(-1)'">Back</button>
</div>
<div class="card ml-3" style="background:#eee; width: 400px">
    
    <div class="m-3">
        <table>
            <tr>
                <td>ID</td>
                <td>:</td>
                <td>{{ $donaturs->id_donatur }}</td>
            </tr>
            <tr>
                <td>Nama Depan</td>
                <td>:</td>
                <td>{{ $donaturs->nama_depan }}</td>
            </tr>
            <tr>
                <td>Nama Belakang</td>
                <td>:</td>
                <td>{{ $donaturs->nama_belakang }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{ $donaturs->email }}</td>
            </tr>
            <tr>
                <td>No Handphone</td>
                <td>:</td>
                <td>{{ $donaturs->no_hp }}</td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>:</td>
                <td>{{ $donaturs->umur }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $donaturs->alamat }}</td>
            </tr>
        </table>
    </div>
</div>

@endsection