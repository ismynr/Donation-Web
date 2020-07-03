@extends('layouts.donatur.app')

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
                      @if ($dataDonasi)
                        <tr>
                          <th style="border:0">Id Kategori</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $dataDonasi['id_kategori'] }}</td>
                        </tr>
                         <tr>
                          <th style="border:0">Nama Kategori</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $dataDonasi->category->nama_kategori }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">Jumlah Donasi</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{"Rp. ". number_format($dataDonasi['jumlah_donasi'], 2, ",", ".") }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">Id Penerima</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $dataDonasi['id_penerima'] }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">Nama Penerima</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $dataDonasi->penerima->nama }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">Tanggal Memberi</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $dataDonasi['tanggal_memberi'] }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">PDF Upload</th>
                          <td style="border:0">:</td>
                          <td style="border:0"><a href="{{Storage::url('public/donasi/pdf/'.$dataDonasi['pdf'])}}" class="btn btn-rounded btn-success" target="_blank">link Download</a></td>
                        </tr>
                        <tr>
                          <th style="border:0">Gambar Upload</th>
                          <td style="border:0">:</td>
                          <td style="border:0"><img src="{{Storage::url('public/donasi/photos/'.$dataDonasi['gambar'])}}" alt="" width="100" height="100"></td>
                        </tr>
                        <tr>
                          <th style="border:0">Terkhir Ditambahkan</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $dataDonasi['created_at'] }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">Terkhir Diubah</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $dataDonasi['updated_at'] }}</td>
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
          </div>
@endsection
