@extends('layouts.app')

@section('content')
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                {{-- <span class="text-uppercase page-subtitle">Overview</span> --}}
                <h3 class="page-title">List Donasi</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    
                    @if ($message = Session::get('message'))
                        <div class="alert alert-success float-left m-1">
                            <span>{{ $message }}</span>
                        </div>
                    @endif

                    <button type="button" class="btn btn-primary float-right tambahModal" data-toggle="modal" data-target="#tambahModal">Tambah</button>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light ">
                        <tr>
                          <th>#</th>
                          <th>Id Kategori</th>
                          <th>Jumlah Donasi</th>
                          <th>Nama Penerima</th>
                          <th>Nama User</th>
                          <th>Tanggal Memberi</th>
                          <th width="25%">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i = 1 @endphp 
                        @forelse ($dataDonasi as $d)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $d['id_kategori'] }}</td>
                          <td>{{ $d['jumlah_donasi'] }}</td>
                          <td>{{ $d['nama_penerima'] }}</td>
                          <td>{{ $d['nama_user'] }}</td>
                          <td>{{ $d['tanggal_memberi'] }}</td>
                          <td>
                            <button type="button" class="btn ml-1 btn-info text-white" onclick="location.href ='{{ url('donasi/'.$d['id_donasi']) }}'">Detail</button>
                            <button type="button" class="btn ml-1 btn-warning editModal" data-id="{{ $d['id_donasi'] }}">Edit</button>
                            <button type="button" class="btn ml-1 btn-danger hapusModal" data-id="{{ $d['id_donasi'] }}">Hapus</button>
                          </td>
                        </tr>
                        @empty
                            <td colspan="6">Tidak ada data</td>
                        @endforelse
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>
@endsection

@section('modals')
  @include('donasi.modals')
@endsection
