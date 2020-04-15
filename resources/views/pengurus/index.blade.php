@extends('layouts.pengurus.app')

@section('content')
<div class="main-content-container container-fluid px-4">
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        {{-- <span class="text-uppercase page-subtitle">Overview</span> --}}
        <h3 class="page-title">Dashboard</h3>
        </div>
    </div>
    <!-- Small Stats Blocks -->
    <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Total Donasi Terlaksana</span>
                        <h6 class="stats-small__value count my-3">{{"Rp. ". number_format($data['total_donasi'], 2, ",", ".") }}</h6>
                      </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Penerima</span>
                        <h6 class="stats-small__value count my-3">{{ $data['penerima']}}</h6>
                      </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-2"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Donatur</span>
                        <h6 class="stats-small__value count my-3">{{ $data['donatur']}}</h6>
                      </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-3"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Donasi</span>
                        <h6 class="stats-small__value count my-3">{{ $data['donasi']}}</h6>
                      </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-3"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Small Stats Blocks -->

            <!-- Top Referrals Component -->
            <!-- <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                <div class="card card-small">
                  <div class="card-header border-bottom">
                    <h5 class="m-0">Riwayat Donasi</h5>
                  </div>
                  <div class="card-body p-0">
                    <ul class="list-group list-group-small list-group-flush">
                    <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">Penerima</span>
                        <span class="ml-auto text-center">Pendonasi</b></span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">Nominal</b></span>
                      </li>
                    @for ($i = 0; $i < 10; $i++)
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">{{$data['riwayat'][$i]->nama}}</span>
                        <span class="ml-auto text-semibold text-reagent-gray">{{$data['riwayat'][$i]->nama_depan}}</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">{{"Rp. ". number_format($data['riwayat'][$i]->jumlah_donasi)}}</span>
                      </li>
                      @endfor
                    </ul>
                  </div>
                  <div class="card-footer border-top">
                    <div class="row">
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- End Top Referrals Component -->

              <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Riwayat Donasi Terakhir</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Penerima</th>
                          <th scope="col" class="border-0">Pendonasi</th>
                          <th scope="col" class="border-0">Nominal</th>
                        </tr>
                      </thead>
                      <tbody>
                      @for ($i = 0; $i < 5; $i++)
                      <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$data['riwayat'][$i]->nama}}</td>
                        <td>{{$data['riwayat'][$i]->nama_depan}}</td>
                        <td>{{"Rp. ". number_format($data['riwayat'][$i]->jumlah_donasi)}}</td>
                      </tr>
                      @endfor
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
</div>
@endsection