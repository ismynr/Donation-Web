@extends('layouts.donatur.app')

@section('content')
  <div class="row page-titles mx-0">
      <div class="col p-md-0">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Donatur</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">Public</a></li>
              <li class="breadcrumb-item active"><a href="javascript:void(0)">Layanan</a></li>
          </ol>
      </div>
  </div>
  <!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="email-left-box">
                        <a href="{{ route('donatur.layanan_public.create') }}" class="btn btn-primary btn-block">Compose</a>
                        <div class="mail-list mt-4">
                            <a href="{{ route('donatur.layanan_public.index') }}" class="list-group-item border-0 p-r-0 @if(app('request')->input('sent') == '') text-primary font-weight-bold @else @endif">
                                <i class="icon-envelope-open mr-2"></i>Inbox <span class="badge badge-primary badge-sm float-right m-t-5">{{ $jumlah_unread }}</span> 
                            </a>
                        </div>
                    </div>
                    <div class="email-right-box">
                        <div class="toolbar" role="toolbar">
                            <span class="btn btn-dark mr-3" >Baca Pesan</span>
                            <a href="javascript:history.back()" class="btn btn-outline-primary"><i class="icon-arrow-left"></i></a>
                            <button type="button" class="btn btn-danger"><i class="icon-trash"></i></button>
                        </div>
                        <div class="compose-content mt-5">
                            <form action="{{ route('donatur.layanan_public.store') }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <div class="form-group">
                                    <input type="text" class="form-control bg-transparent" name="subject" placeholder=" Subject">
                                </div>
                                <div class="form-group">
                                    <textarea class="textarea_editor form-control bg-light" name="pesan" rows="15" placeholder="Enter text ..."></textarea>
                                </div>
                        </div>
                        <div class="text-right m-t-15">
                            <button class="btn btn-primary m-b-30 m-t-15 f-s-14 p-l-20 p-r-20 m-r-10" type="submit"><i class="fa fa-paper-plane m-r-5"></i> Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
