@extends('layouts.app')
@section('content')

<section class="mr-3 ml-3">
    <div class="header">
        <h1>Daftar Donatur</h1>
    </div>
    <div class="body">
        <div class="card rounded" style="background: #eee">
            <div class="container">
                <div class="header">
                    <div class="mb-2"><a href="{{route('donatur.create')}}" class="btn btn-primary btn-sm mt-2">Create User</a></div>
                </div>
                <hr>
                <div class="body">
                    <table class="table table-hover table-bordered">
                        <thead style="background: #9e9e9e">
                            <tr>
                                <th>Nama Depan</th>
                                <th>Nama Belakang</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Umur</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donaturs as $donatur)
                                <tr>
                                    <td>{{ $donatur->nama_depan}}</td>
                                    <td>{{ $donatur->nama_belakang }}</td>
                                    <td>{{ $donatur->no_hp }}</td>
                                    <td>{{ $donatur->alamat }}</td>
                                    <td>{{ $donatur->umur }}</td>
                                    <td>
                                        <form action="{{ route('donatur.destroy', $donatur->id_donatur) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <a href="{{ route('donatur.edit', $donatur->id_donatur) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
</section>

@endsection
