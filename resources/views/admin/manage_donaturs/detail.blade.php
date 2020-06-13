@extends('layouts.admin.app')

@section('content')
<div class="ml-3 mb-3">
<button type="button" class="btn ml-1 mr-1 btn-info text-white" onclick="location.href ='javascript:history.go(-1)'">Back</button>
</div>
<div class="card ml-3" style="background:#eee; width: 400px">
    
    <div class="m-3">
        <table>
        @foreach($donaturs->donasi as $donation)
            <tr> 
                <td>Kategori</td>
                <td>:</td>
                <td>{{ $donation->id_kategori}}</td>
            </tr>
            <tr>
                <td>Nama Penerima</td>
                <td>:</td>
                <td>{{ $donation->id_penerima }}</td>
            </tr>
            <tr>
                <td>Jumlah Donasi</td>
                <td>:</td>
                <td>{{ $donation->jumlah_donasi }}</td>
            </tr>
            <tr>
                <td>Tanggal Donasi</td>
                <td>:</td>
                <td>{{ $donation->tanggal_memberi }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection