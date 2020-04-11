@extends('layouts.pengurus.app')

@section('content')
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                {{-- <span class="text-uppercase page-subtitle">Overview</span> --}}
                <h3 class="page-title">Detail Data</h3>
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
                      @forelse ($data as $d)
                        <tr>
                          <th style="border:0">Nama</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $d['nama'] }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">Alamat</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $d['alamat'] }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">tgl_lahir</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $d['tgl_lahir'] }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">jenkel</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $d['jenkel'] }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">umur</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $d['umur'] }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">jumkel</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $d['jumkel'] }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">penghasilan</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $d['penghasilan'] }}</td>
                        </tr>
                      @empty
                          <td colspan="3">Tidak dapat menampilkan detail data</td>
                      @endforelse
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>
@endsection
