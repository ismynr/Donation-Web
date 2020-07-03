<!-- ADD ITEM MODAL -->
<div class="modal fade" id="tambahModal" data-backdrop="static" role="dialog" aria-labelledby="tambahData" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="tambahData">Tambah Data</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="tambahForm">
          {{ csrf_field() }}
          <div class="form-group">
              <label for="name" class="col-form-label">Kategori Donasi:</label>
              <select name="id_kategori" class="cari_kategori form-control select2"></select>
              <small class="errorId_kategori text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="name" class="col-form-label">Jumlah Donasi:</label>
              <input type="text" class="form-control" name="jumlah_donasi">
              <small class="errorJumlah_donasi text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="name" class="col-form-label">Penerima:</label>
              <select name="id_penerima" class="cari_penerima form-control select2"></select>
              <small class="errorId_penerima text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="city" class="col-form-label">Tanggal Pemberian:</label>
              <input type="date" class="form-control datepicker" name="tanggal_memberi" placeholder="ex: 2020-03-28" autocomplete="off">
              <small class="errorTanggal_memberi text-danger hidden"></small>
          </div>
          <div class="form-group">
            <label for="gambar" class="col-form-label">Upload Photo *bukti sudah menyerahkan donasi/bisa nanti:</label> <br/>
            <input type="file" id="gambar" name="gambar" />
            <small class="errorGambar text-danger hidden"></small>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col s6">
                  <img src="http://placehold.it/100x100" class="showgambar" style="max-width:200px;max-height:200px;float:left;" />
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="storeBtn">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- EDIT ITEM MODAL -->
<div class="modal fade" id="editModal" data-backdrop="static"   role="dialog" aria-labelledby="editData" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="editData">Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editForm">
          {{ csrf_field() }}
          <input type="hidden" id="edit_id" name="id">
          <div class="form-group">
              <label for="name" class="col-form-label">Kategori Donasi:</label>
              <select id="edit_id_kategori" name="id_kategori" class="cari_kategori form-control select2"></select>
              <small class="edit_errorId_kategori text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="name" class="col-form-label">Jumlah Donasi:</label>
              <input type="text" class="form-control" id="edit_jumlah_donasi" name="jumlah_donasi">
              <small class="edit_errorJumlah_donasi text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="name" class="col-form-label">Penerima:</label>
              <select id="edit_id_penerima" name="id_penerima" class="cari_penerima form-control select2"></select>
              <small class="edit_errorId_penerima text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="city" class="col-form-label">Tanggal Pemberian:</label>
              <input type="date" class="form-control datepicker" id="edit_tanggal_memberi" name="tanggal_memberi" placeholder="ex: 2020-03-28" autocomplete="off">
              <small class="edit_errorTanggal_memberi text-danger hidden"></small>
          </div>
          <div class="form-group">
            <label for="gambar" class="col-form-label">Upload Bentuk Kategori <small class="text-muted">*kosongkan kalo nggak mau diganti</small>:</label> <br/>
            <input type="file" id="edit_gambar" name="gambar" />
            <small class="edit_errorGambar text-danger hidden"></small>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col s6">
                  <img src="http://placehold.it/100x100" class="showgambar" id="edit_showgambar" style="max-width:200px;max-height:200px;float:left;" />
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="updateBtn" class="btn btn-warning">Ubah</button>
          </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(function () {

    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    // View data with yajra datatables 
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('donatur.donasi.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false},
            {data: 'category', name: 'category', searchable: false, orderable: false},
            {data: 'jumlah_donasi', name: 'jumlah_donasi', render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp. ' )},
            {data: 'pdf', name: 'pdf', 
              render: function( data, type, full, meta ) {
                        if(data == null){
                          return '<small class="text-muted">Belum upload</small>';
                        }else{
                          return "<a class='btn btn-rounded btn-success btn-sm' href=\"{{Storage::url('public/donasi/pdf/')}}" + data + "\" target='_blank'>pdf</a>"; 
                        }
                      }},
            {data: 'gambar', name: 'gambar', 
              render: function( data, type, full, meta ) {
                        if(data == null){
                          return '<small class="text-muted">Belum upload</small>';
                        }else{
                          return "<img src=\"{{Storage::url('public/donasi/photos/')}}" + data + "\" width=\"50\" height=\"50\"/>"; 
                        }
                      }},
            {data: 'penerima', name: 'penerima', searchable: false, orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    // Add button to show modal dialog
    $('.tambahModal').click(function(){
      $('.showgambar').attr('src', 'http://placehold.it/100x100');
      $('#storeBtn').html('Tambah');
      $('#tambahForm').trigger("reset");
    });

    // Save Button in modal dialog
    $('#storeBtn').click(function (e) {
        e.preventDefault();
        var frm = $('#tambahForm');
        $('.errorId_kategori').hide();
        $('.errorId_penerima').hide();
        $('.errorJumlah_donasi').hide();
        $('.errorTanggal_memberi').hide();
        $('.errorPdf').hide();
        $('.errorGambar').hide();
        $(this).html('Sending..');
    
        $.ajax({
          // data: frm.serialize(),
          data: new FormData($("#tambahForm")[0]),
          url: "{{ route('donatur.donasi.store') }}",
          type: "POST",
          dataType: 'json',
          processData: false,
          contentType: false,
          success: function (data) {
            if (data.errors) {
                if (data.errors.id_kategori) {
                  $('.errorId_kategori').show();
                  $('.errorId_kategori').text(data.errors.id_kategori);
                }
                if (data.errors.id_penerima) {
                  $('.errorId_penerima').show();
                  $('.errorId_penerima').text(data.errors.id_penerima);
                }
                if (data.errors.jumlah_donasi) {
                  $('.errorJumlah_donasi').show();
                  $('.errorJumlah_donasi').text(data.errors.jumlah_donasi);
                }
                if (data.errors.tanggal_memberi) {
                  $('.errorTanggal_memberi').show();
                  $('.errorTanggal_memberi').text(data.errors.tanggal_memberi);
                }
                if (data.errors.gambar) {
                  $('.errorGambar').show();
                  $('.errorGambar').text(data.errors.gambar);
                }
            }else {
              $('#tambahModal').modal('hide');
              frm.trigger("reset");
              table.draw();
              swal('success!','Successfully Added','success');
            }
            $('#storeBtn').html('Tambah');
          },
          error: function (data) {
              console.log('Error:', data);
              $('#storeBtn').html('Tambah');
          }
      });
    });

    // Edit button to show modal dialog
    $('#table').on('click','.editBtn[data-id]',function(e){
        e.preventDefault();
        var url = $(this).data('id');
        $.ajax({
            url : url,
            type : 'GET',
            datatype : 'json',
            success:function(data){
                $('#edit_id').val(data.id_donasi);
                $('#edit_jumlah_donasi').val(data.jumlah_donasi);
                $('#edit_tanggal_memberi').val(data.tanggal_memberi);
                var row1 = $('#table tbody tr td:eq(1)').text();
                var row5 = $('#table tbody tr td:eq(5)').text();
                $("#edit_id_kategori").select2("trigger", "select", {
                    data: { id: data.id_kategori, text:row1 }
                });
                $("#edit_id_penerima").select2("trigger", "select", {
                    data: { id: data.id_penerima, text:row5 }
                });
                $('#edit_showgambar').attr('src', '{{Storage::url("donasi/photos/")}}'+data.gambar);
                $('.errorId_kategori').hide();
                $('.errorId_penerima').hide();
                $('.errorJumlah_donasi').hide();
                $('.errorTanggal_memberi').hide();
                $('#editModal').modal('show');
            }
        });
    });
    
    // Update button in modal dialog
    $('#updateBtn').click(function(e){
        e.preventDefault();
        $('.errorId_kategori').hide();
        $('.errorId_penerima').hide();
        $('.errorJumlah_donasi').hide();
        $('.errorTanggal_memberi').hide();
        $('.errorPdf').hide();
        $('.edit_errorGambar').hide();
        var url = "/donatur/donasi/"+$('#edit_id').val();
        var frm = $('#editForm');
        var formdata = new FormData($("#editForm")[0]);
        formdata.append('_method', 'PUT');

        $.ajax({
            // data : frm.serialize(),
            data : formdata,
            method :'POST',
            url : url,
            dataType : 'json',
            processData: false,
            contentType: false,
            success:function(data){
              if (data.errors) {
                if (data.errors.id_kategori) {
                  $('.edit_errorId_kategori').show();
                  $('.edit_errorId_kategori').text(data.errors.id_kategori);
                }
                if (data.errors.id_penerima) {
                  $('.edit_errorId_penerima').show();
                  $('.edit_errorId_penerima').text(data.errors.id_penerima);
                }
                if (data.errors.jumlah_donasi) {
                  $('.edit_errorJumlah_donasi').show();
                  $('.edit_errorJumlah_donasi').text(data.errors.jumlah_donasi);
                }
                if (data.errors.tanggal_memberi) {
                  $('.edit_errorTanggal_memberi').show();
                  $('.edit_errorTanggal_memberi').text(data.errors.tanggal_memberi);
                }
                if (data.errors.gambar){
                  $('.edit_errorGambar').show();
                  $('.edit_errorGambar').text(data.errors.gambar);
                }
              }else {
                $('#editModal').modal('hide');
                frm.trigger('reset');
                swal('Success!','Data Updated Successfully','success');
                table.ajax.reload(null,false);
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {
              alert('Please Reload to read Ajax');
            }
        });
    });

    // Delete Or Destroy button to show sweetalert
    $('#table').on('click','.deleteBtn[data-id]',function(e){
        e.preventDefault();
        var url = $(this).data('id');
        swal({
           title: "Are you sure want to remove this item?",
           text: "Data will be Temporary Deleted!",
           type: "warning",
           showCancelButton: true,
           confirmButtonClass: "btn-danger",
           confirmButtonText: "Confirm",
           cancelButtonText: "Cancel",
           closeOnConfirm: false,
           closeOnCancel: false,
        },
        function(isConfirm) {
          if (isConfirm) {
            $.ajax({
                url : url,
                type: 'DELETE',
                dataType : 'json',
                data : { method : '_DELETE' , submit : true},
                success:function(data){
                    if (data == 'Success') {
                      swal("Deleted!", "Donasi has been deleted", "success");
                      table.ajax.reload(null,false);
                    }
                }
            });
          }else { swal.close(); }
        });
      });

        // SHOW IMAGE
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#edit_gambar").change(function () {
        readURL(this);
    });
    $("#gambar").change(function () {
        readURL(this);
    });
    





    /**
     * 
     * AJAX AUTOCOMPLETE 
     * 
     */
    // Auto complete combobox category select
    $('.cari_kategori').select2({
      theme: "bootstrap",
      placeholder: 'Pilih Kategori',
      ajax: {
          url: "<?=route('donatur.donasi.cari.category');?>",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return { q: params.term }
          },
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                return {
                    text:  item.nama_kategori,
                    id: item.id_kategori
                }
              })
            };
          }, cache: true
      },
      templateSelection: function (selection) {
          var result = selection.text.split('-');
          return result[0];
      }
    });

    // Auto complete combobox penerima select
      $('.cari_penerima').select2({
        theme: "bootstrap",
        placeholder: 'Pilih Penerima',
        ajax: {
            url: "<?=route('donatur.donasi.cari.penerima');?>",
            dataType: 'json',
            delay: 250,
            data: function (params) {
              return { q: params.term }
            },
            processResults: function (data) {
              return {
                results:  $.map(data, function (item) {
                  return {
                      text: item.nama+' - (id: '+item.id_penerima+')',
                      id: item.id_penerima
                  }
                })
              };
            }, cache: true
        },
        templateSelection: function (selection) {
            var result = selection.text.split('-');
            return result[0];
        }
    });

  });
</script>