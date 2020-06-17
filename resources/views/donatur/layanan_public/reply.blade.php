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
                        <a href="{{ route('donatur.layanan_public.create') }}" class="btn btn-primary btn-block"> Compose</a>
                        <div class="mail-list mt-4">
                            <a href="{{ route('donatur.layanan_public.index') }}" class="list-group-item border-0 p-r-0 @if(app('request')->input('sent') == '') text-primary font-weight-bold @else @endif">
                                <i class="icon-envelope-open mr-2"></i>Inbox <span class="badge badge-primary badge-sm float-right m-t-5">{{ $jumlah_unread }}</span> 
                            </a>
                        </div>
                    </div>
                    <div class="email-right-box">
                        <div class="toolbar" role="toolbar">
                            <span class="btn btn-dark mr-3" >Baca Pesan</span>
                            <a href="javascript:window.location=document.referrer;" class="btn btn-outline-primary"><i class="icon-arrow-left"></i></a>
                            <button type="button" class="btn btn-danger"><i class="icon-trash"></i></button>
                        </div>
                        <div class="read-content">
                            <div class="media pt-5">
                                <img class="mr-3 rounded-circle" src="@if($layananpublic->id_pengurus != null) {{ asset('quixlab') }}/images/user/operator.png @else {{ asset('quixlab') }}/images/user/form-user.png @endif" width="50" height="50">
                                <div class="media-body">
                                    <h5 class="m-b-3">{{ $layananpublic->nama }}</h5>
                                    <p class="m-b-2">{{ $layananpublic->created_at }}</p>
                                </div>                                          
                            </div>
                            <hr>
                            <div class="media mb-4 mt-1">
                                <div class="media-body"><span class="float-right">{{ date("H:i a",strtotime($layananpublic->created_at)) }}</span>
                                    <h4 class="m-0 text-primary">{{ $layananpublic->subject }}</h4>
                                    <small class="text-muted">Dari: {{ $layananpublic->email }}</small>
                                </div>
                            </div>
                            {{ $layananpublic->pesan }}
                            <hr>
                            @if ($layananpublic->id_pengurus != NULL)
                            <form action="{{ route('donatur.layanan_public.store') }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <input type="hidden" value="{{ $layananpublic->subject }}" name="subject">
                                <div class="form-group p-t-15">
                                    @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <span class="alert-inner--text">{{ $error }}</span><br/>
                                        @endforeach
                                    </div>
                                    @endif
                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        <span class="alert-inner--text">{{session('success')}}</span>
                                    </div>
                                    @endif
                                    <textarea class="w-100 p-20 form-control" name="pesan" id="" cols="30" rows="5" placeholder="Balas pesan ...."></textarea>
                                </div>
                            <div class="text-right">
                                <button class="btn btn-primary-md m-b-30" type="submit">Send</button>
                                </form>
                            </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
