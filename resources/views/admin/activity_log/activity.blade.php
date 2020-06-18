@extends('layouts.admin.app')

@section('content')

  <div class="row page-titles mx-0">
      <div class="col p-md-0">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Log</a></li>
              <li class="breadcrumb-item active"><a href="javascript:void(0)">Activity</a></li>
          </ol>
      </div>
  </div>
  <!-- row -->

  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title float-left">Aktifitas User</h4>
                      <div class="table-responsive">
                          <table class="table data-table table-striped table-bordered table-sm" id="table">
                            <thead>
                              <tr>
                                <th>Description</th>
                                <th>Subject</th>
                                <th>User</th>
                                <th>Kapan</th>
                                <th>Opsi</th>
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
  @include('admin.activity_log.modals')
@endsection

  

