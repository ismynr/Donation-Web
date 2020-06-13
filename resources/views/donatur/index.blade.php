@extends('layouts.donatur.app')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
          <div class="card gradient-1 text-center">
              <div class="card-body">
                  <h3 class="card-title text-white">Total Donasi Terlaksana</h3>
                  <div class="d-inline-block">
                      <h2 class="text-white">{{"Rp. ". number_format($data['total_donasi'], 2, ",", ".") }}</h2>
                      <p class="text-white mb-0">Jan - Desember 2020</p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-lg-4">
          <div class="card gradient-2">
              <div class="card-body">
                  <h3 class="card-title text-white">Penerima Bantuan</h3>
                  <div class="d-inline-block">
                      <h2 class="text-white">{{ $data['penerima']}}</h2>
                      <p class="text-white mb-0">Jan - Desember 2020</p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
              </div>
          </div>
      </div>
      <div class="col-lg-4">
          <div class="card gradient-3">
              <div class="card-body">
                  <h3 class="card-title text-white">Donatur</h3>
                  <div class="d-inline-block">
                      <h2 class="text-white">{{ $data['donatur']}}</h2>
                      <p class="text-white mb-0">Jan - Desember 2020</p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
              </div>
          </div>
      </div>
      <div class="col-lg-4">
          <div class="card gradient-4">
              <div class="card-body">
                  <h3 class="card-title text-white">Jumlah Donasi</h3>
                  <div class="d-inline-block">
                      <h2 class="text-white">{{ $data['donasi']}}</h2>
                      <p class="text-white mb-0">Jan - Desember 2020</p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection