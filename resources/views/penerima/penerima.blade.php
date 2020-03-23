@extends('layouts.app')

@section('content')
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                {{-- <span class="text-uppercase page-subtitle">Overview</span> --}}
                <h3 class="page-title">List Data Penerima</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    
                    @if(Session::has('alert-success'))
                      <div class="alert alert-success float-left m-1">
                        <strong>{{ Session::get('alert-success') }}</strong>
                      </div>
                    @endif

                    <button type="button" class="btn btn-primary float-right tambahModal" data-toggle="modal" data-target="#tambahModal">Tambah</button>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light ">
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Tgl Lahir</th>
                          <th>JK</th>
                          <th>Umur</th>
                          <th>Jumlah Keluarga</th>
                          <th>Penghasilan/bln</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i = 1 @endphp 
                        @forelse ($data as $d)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $d['nama'] }}</td>
                          <td>{{ $d['alamat'] }}</td>
                          <td>{{ $d['tgl_lahir'] }}</td>
                          <td>{{ $d['jenkel'] }}</td>
                          <td>{{ $d['umur'] }}</td>
                          <td>{{ $d['jumkel'] }}</td>
                          <td>{{ $d['penghasilan'] }}</td>
                          <td>
                            <button type="button" class="btn ml-1 mr-1 btn-info text-white" onclick="location.href ='{{ url('penerima/'.$d['id']) }}'">Detail</button>
                            <button type="button" class="btn ml-1 mr-1 btn-warning editModal" data-id="{{ $d['id'] }}">Edit</button>
                            <button type="button" class="btn ml-1 mr-1 btn-danger hapusModal" data-id="{{ $d['id'] }}">Hapus</button>
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
  @include('penerima.modals')
@endsection