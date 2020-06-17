@extends('layouts.pengurus.app')
@section('content')
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                {{-- <span class="text-uppercase page-subtitle">Overview</span> --}}
                <h3 class="page-title">Detail Data (Donasi)</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <button type="button" class="btn ml-1 mr-1 btn-info text-white" onclick="location.href ='javascript:history.go(-1)'">Back</button>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table">
                      @if ($donaturs)
                        <tr>
                          <th style="border:0">Id donatur</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $donaturs->id_donatur }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">Nama Depan</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $donaturs->nama_depan }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">Nama Belakang</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $donaturs->nama_belakang }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">email</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $donaturs->email }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">no_hp</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $donaturs->no_hp }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">alamat</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $donaturs->alamat }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">umur</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $donaturs->umur }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">dibuat pada</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $donaturs->created_at }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">diubah pada</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $donaturs->updated_at }}</td>
                        </tr>
                      @else
                          <td colspan="3">Tidak dapat menampilkan detail data</td>
                      @endif
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->

              <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="active-member">
                  <h4 class="mb-4">Donasi Donatur</h4>
                    <div class="table-responsive">
                        <table class="table table-xs mb-0">
                            <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Kategori</th>
                                  <th scope="col">Penerima</th>
                                  <th scope="col">Donasi</th>
                                  <th scope="col">Tanggal Memberi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($donaturs->donasi as $donation)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$donation->id_kategori}}</td>
                                    <td>{{$donation->id_penerima}}</td>
                                    <td>{{"Rp. ". number_format($donation->jumlah_donasi)}}</td>
                                    <td>{{$donation->tanggal_memberi}}</td>
                                </tr>
                                @empty
                                    <tr col>    
                                        <td colspan="5" class="text-center">Belum donasi</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>                        
    </div>
</div>
          </div>
@endsection


