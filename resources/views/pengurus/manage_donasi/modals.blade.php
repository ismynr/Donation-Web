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
              <label for="name" class="col-form-label">Donatur:</label>
              <select name="id_donatur" class="cari_donatur form-control select2"></select>
              <small class="errorId_donatur text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="city" class="col-form-label">Tanggal Pemberian:</label>
              <input type="text" class="form-control datepicker" name="tanggal_memberi" placeholder="ex: 2020-03-28" autocomplete="off">
              <small class="errorTanggal_memberi text-danger hidden"></small>
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
              <label for="name" class="col-form-label">Donatur:</label>
              <select id="edit_id_donatur" name="id_donatur" class="cari_donatur form-control select2"></select>
              <small class="edit_errorId_donatur text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="city" class="col-form-label">Tanggal Pemberian:</label>
              <input type="text" class="form-control datepicker" id="edit_tanggal_memberi" name="tanggal_memberi" placeholder="ex: 2020-03-28" autocomplete="off">
              <small class="edit_errorTanggal_memberi text-danger hidden"></small>
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
        ajax: "{{ route('donasi.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'category', name: 'category'},
            {data: 'jumlah_donasi', name: 'jumlah_donasi', render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp. ' )},
            {data: 'penerima', name: 'penerima'},
            {data: 'donatur', name: 'donatur'},
            {data: 'tanggal_memberi', name: 'tanggal_memberi'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    // Save Button in modal dialog
    $('#storeBtn').click(function (e) {
        e.preventDefault();
        var frm = $('#tambahForm');
        $('.errorId_kategori').hide();
        $('.errorId_penerima').hide();
        $('.errorId_donatur').hide();
        $('.errorJumlah_donasi').hide();
        $('.errorTanggal_memberi').hide();
        $(this).html('Sending..');
    
        $.ajax({
          data: frm.serialize(),
          url: "{{ route('donasi.store') }}",
          type: "POST",
          dataType: 'json',
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
                if (data.errors.id_donatur) {
                  $('.errorId_donatur').show();
                  $('.errorId_donatur').text(data.errors.id_donatur);
                }
                if (data.errors.jumlah_donasi) {
                  $('.errorJumlah_donasi').show();
                  $('.errorJumlah_donasi').text(data.errors.jumlah_donasi);
                }
                if (data.errors.tanggal_memberi) {
                  $('.errorTanggal_memberi').show();
                  $('.errorTanggal_memberi').text(data.errors.tanggal_memberi);
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
                var row3 = $('#table tbody tr td:eq(3)').text();
                var row4 = $('#table tbody tr td:eq(4)').text();
                $("#edit_id_kategori").select2("trigger", "select", {
                    data: { id: data.id_kategori, text:row1 }
                });
                $("#edit_id_penerima").select2("trigger", "select", {
                    data: { id: data.id_penerima, text:row3 }
                });
                $("#edit_id_donatur").select2("trigger", "select", {
                    data: { id: data.id_donatur, text:row4 }
                });
                $('.errorId_kategori').hide();
                $('.errorId_penerima').hide();
                $('.errorId_donatur').hide();
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
        $('.errorId_donatur').hide();
        $('.errorJumlah_donasi').hide();
        $('.errorTanggal_memberi').hide();
        var url = "/pengurus/donasi/"+$('#edit_id').val();
        var frm = $('#editForm');

        $.ajax({
            data : frm.serialize(),
            type :'PUT',
            url : url,
            dataType : 'json',
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
                if (data.errors.id_donatur) {
                  $('.edit_errorId_donatur').show();
                  $('.edit_errorId_donatur').text(data.errors.id_donatur);
                }
                if (data.errors.jumlah_donasi) {
                  $('.edit_errorJumlah_donasi').show();
                  $('.edit_errorJumlah_donasi').text(data.errors.jumlah_donasi);
                }
                if (data.errors.tanggal_memberi) {
                  $('.edit_errorTanggal_memberi').show();
                  $('.edit_errorTanggal_memberi').text(data.errors.tanggal_memberi);
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
                      swal("Deleted!", "Category has been deleted", "success");
                      table.ajax.reload(null,false);
                    }
                }
            });
          }else { swal.close(); }
        });
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
          url: "<?=route('donasi.cari.category');?>",
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
            url: "<?=route('donasi.cari.penerima');?>",
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

    // Auto complete combobox donatur select
      $('.cari_donatur').select2({
        theme: "bootstrap",
        placeholder: 'Pilih Donautur',
        ajax: {
            url: "<?=route('donasi.cari.donatur');?>",
            dataType: 'json',
            delay: 250,
            data: function (params) {
              return { q: params.term }
            },
            processResults: function (data) {
              return {
                results:  $.map(data, function (item) {
                  return {
                      text: item.nama_depan+' '+item.nama_belakang+' - (id: '+item.id_donatur+')',
                      id: item.id_donatur
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

    // Datepicker style for date input
    $(".datepicker").datepicker({
      format: "yyyy-mm-dd",
      weekStart: 0,
      calendarWeeks: true,
      autoclose: true,
      todayHighlight: true,
      rtl: true,
      orientation: "auto"
    });

  });
</script>