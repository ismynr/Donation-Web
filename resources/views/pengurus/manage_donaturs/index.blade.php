@extends('layouts.pengurus.app')
@section('content')

<section class="mr-3 ml-3">
    <div class="header">
        <h1>Daftar Donatur</h1>
    </div>
    <div class="body">
        <div class="card rounded" style="background: #eee">
            <div class="container">
                <div class="header">
                    <div class="mb-2"><a href="{{route('donatur.create')}}" class="btn btn-primary btn-sm mt-2">Create User</a></div>
                </div>
                <hr>
                <div class="body">
                    <table class="table table-hover table-bordered data-table">
                        <thead style="background: #9e9e9e">
                            <tr>
                                <th>No</th>
                                <th>Nama Depan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    
    </div>
</section>
<script>
$(document).ready(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 3,
            "order": [
                [0, "desc"]
            ],
            ajax: "{{ route('donatur.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_depan',
                    name: 'nama_depan'
                },
                {
                    data: 'Actions',
                    name: 'Actions',
                    orderable: false,
                    searchable: false,
                    sClass: 'text-center'
                },
            ]
        });
    });

    function konfirmasiDelete(){
        confirm("Apakah anda yakin?");
    }
</script>

@endsection
