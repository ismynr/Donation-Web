@extends('layouts.admin.app')

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
                      @if ($data)
                        <tr>
                          <th style="border:0">NIP</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $data->nip }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">Nama</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $data->nama }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">Jabatan</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $data->jabatan }}</td>
                        </tr>
                        <tr>
                          <th style="border:0">Email</th>
                          <td style="border:0">:</td>
                          <td style="border:0">{{ $data->user->email }}</td>
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
