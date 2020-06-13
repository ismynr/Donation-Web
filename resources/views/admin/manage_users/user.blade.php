@extends('layouts.admin.app')

@section('content')
 <div class="row page-titles mx-0">
      <div class="col p-md-0">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0)">User Admin</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">Management</a></li>
              <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
          </ol>
      </div>
  </div>
  <!-- row -->

<div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title float-left">List Data User <small class="text-muted">Belum verification email</small></h4>
                      <div class="table-responsive">
                          <table class="table data-table table-striped table-bordered" id="table">
                            <thead class="bg-light ">
                              <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Bergabung Pada</th>
                                <th width="20%">Opsi</th>
                              </tr>
                            </thead>
                            <tbody> </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

@section('modals')
  @include('admin.manage_users.modals')
@endsection