@extends('layouts.admin.app')

@section('content')
 <div class="row page-titles mx-0">
      <div class="col p-md-0">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0)">User Admin</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">Management</a></li>
              <li class="breadcrumb-item active"><a href="javascript:void(0)">Pengurus</a></li>
          </ol>
      </div>
  </div>
  <!-- row -->

<div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title float-left">List Data Pengurus</h4>
                      <button type="button" class="btn btn-primary float-right tambahModal" data-toggle="modal" data-target="#tambahModal">Tambah</button>
                      <div class="table-responsive">
                          <table class="table data-table table-striped table-bordered" id="table">
                            <thead class="bg-light ">
                              <tr>
                                <th>#</th>
                                <th>NIP</th>
                                <th>Nama Pengurus</th>
                                <th>Jabatan</th>
                                <th width="25%">Opsi</th>
                              </tr>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

@section('modals')
  @include('admin.manage_pengurus.modals')
@endsection