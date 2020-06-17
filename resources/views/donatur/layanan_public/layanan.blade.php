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
                            <a href="{{ route('pengurus.layanan_public.index') }}" class="list-group-item border-0 p-r-0 @if(app('request')->input('sent') == '') text-primary font-weight-bold @else @endif">
                                <i class="icon-envelope-open mr-2"></i>Inbox
                                <span class="badge badge-primary badge-sm float-right m-t-5">{{ $jumlah_unread }}</span> 
                            </a>
                        </div>
                    </div>
                    <div class="email-right-box">
                        <div role="toolbar" class="toolbar">
                            <span class="btn btn-dark mr-3" >Daftar Pesan</span>
                        </div>
                        <div class="email-list m-t-15">
                            @if (count($errors) > 0)
                            <div class="alert alert-danger mt-2">
                                @foreach ($errors->all() as $error)
                                    <span class="alert-inner--text">{{ $error }}</span><br/>
                                @endforeach
                            </div>
                            @endif
                            @if (session('success'))
                            <div class="alert alert-success mt-2">
                                <span class="alert-inner--text">{{session('success')}}</span>
                            </div>
                            @endif
                            @forelse ($lp as $l)
                            <div class="message">
                                <a href="{{ route('donatur.layanan_public.show', $l->id) }}">
                                    <div class="col-mail col-mail-1">
                                        @if($l->id_pengurus != NULL && $l->read == 0)
                                            <div class="badge badge-danger">unread</div>
                                        @endif 
                                        @if($l->id_pengurus != NULL)
                                            <div class="badge badge-dark"><i class="icon-action-redo"></i></div>
                                        @endif 
                                        @if($l->reply == 1)
                                        <div class="badge badge-primary">answered</div>
                                        @endif
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <div class="subject"><strong>{{ $l->subject }}</strong>, {{ $l->pesan }}</div>
                                        <div class="date">{{ date("H:i a",strtotime($l->created_at)) }} </div>
                                    </div>
                                </a>
                            </div>
                            @empty
                            <div class="message">Tidak ada pesan terkirim</div>
                            @endforelse
                        </div>
                        <!-- panel -->
                        @if ($lp->total())
                        <div class="row justify-content-between mt-4">
                            <div class="col-lg-7 mt-2">
                                <div>Showing {{ $lp->currentPage()}} to {{ $lp->perPage() }} of {{ $lp->total() }} entries</div>
                            </div>
                            <div class="col-lg-3 ">
                                {{ $lp->links() }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
