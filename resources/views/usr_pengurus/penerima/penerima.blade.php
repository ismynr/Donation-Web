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
                  <div class="card-header">

                    <button type="button" class="btn btn-primary float-right tambahModal" data-toggle="modal" data-target="#tambahModal">Tambah</button>
                  </div>
                  <div class="card-body p-3 text-center">
                    <table class="table data-table" id="table">
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
  @include('usr_pengurus.penerima.modals')
@endsection