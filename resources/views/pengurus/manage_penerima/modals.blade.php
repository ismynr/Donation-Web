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
          <form id="tambahForm" >
            {{ csrf_field() }}
              <div class="form-group">
                <label for="name" class="col-form-label">Nama :</label>
                <input type="text" class="form-control" name="nama">
                <small class="errorNama text-danger hidden"></small>
              </div>
              <div class="form-group">
                  <label for="alamat" class="col-form-label">Alamat:</label>
                  <input type="text" class="form-control" name="alamat">
                <small class="errorAlamat text-danger hidden"></small>
              </div>
              <div class="form-group">
                <label for="tgl_lahir" class="col-form-label">Tanggal lahir:</label>
                <input type="date" class="form-control" name="tgl_lahir">
                <small class="errorTglLahir text-danger hidden"></small>
              </div>
              <div class="form-group">
                  <label for="jenkel" class="col-form-label">Jenis Kelamin:</label>
                  <select class="form-control" name="jenkel">
                    <option value="" disabled>Pilih Jenis Kelamin</option>
                    <option value="l">Laki-Laki</option>
                    <option value="p">Perempuan</option>
                  </select>
                  <small class="errorJenkel text-danger hidden"></small>
              </div>
              <div class="form-group">
                <label for="umur" class="col-form-label">Umur:</label>
                <input type="number" class="form-control" name="umur">
                <small class="errorUmur text-danger hidden"></small>
              </div>
              <div class="form-group">
                <label for="jumkel" class="col-form-label">Jumlah Keluarga:</label>
                <input type="number" class="form-control" name="jumkel" >
                <small class="errorJumkel text-danger hidden"></small>
              </div>
              <div class="form-group">
                <label for="penghasilan" class="col-form-label">Penghasilan/bln:</label>
                <input type="number" class="form-control" name="penghasilan">
                <small class="errorPenghasilan text-danger hidden"></small>
              </div>
              <div class="form-group">
                <label for="pdf" class="col-form-label">PDF :</label> <br/>
                <input type="file" class="form-control" name="pdf">
                <small class="errorPdf text-danger hidden"></small>
              </div>
              <div class="form-group">
                <label for="gambar" class="col-form-label">Upload Photo :</label> <br/>
                <input type="file" id="gambar" class="form-control" name="gambar">
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
          <button type="submit" id="storeBtn" class="btn btn-primary">Tambah Anggota</button>
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
                <label for="nama" class="col-form-label">Name:</label>
                <input type="text" class="form-control" id="edit_nama" name="nama">
                <small class="edit_errorNama text-danger hidden"></small>
              </div>
              <div class="form-group">
                  <label for="alamat" class="col-form-label">Alamat:</label>
                  <input type="text" class="form-control" name="alamat" id="edit_alamat">
                  <small class="edit_errorAlamat text-danger hidden"></small>
              </div>
              <div class="form-group">
                <label for="tgl_lahir" class="col-form-label">Tanggal lahir:</label>
                <input type="date" class="form-control" name="tgl_lahir" id="edit_tgl_lahir">
                <small class="edit_errorTglLahir text-danger hidden"></small>
              </div>
              <div class="form-group" id="select_jenkel">
                  <label for="jenkel" class="col-form-label">Jenis Kelamin:</label>
                  <select class="form-control" name="jenkel" id="edit_jenkel">
                    <option value="" disabled>Pilih Jenis Kelamin</option>
                    <option value="l">Laki-Laki</option>
                    <option value="p">Perempuan</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="umur" class="col-form-label">Umur:</label>
                <input type="number" class="form-control" name="umur" id="edit_umur">
                <small class="edit_errorUmur text-danger hidden"></small>
              </div>
              <div class="form-group">
                <label for="jumkel" class="col-form-label">Jumlah Keluarga:</label>
                <input type="number" class="form-control" name="jumkel" id="edit_jumkel">
                <small class="edit_errorJumkel text-danger hidden"></small>
              </div>
              <div class="form-group">
                <label for="penghasilan" class="col-form-label">Penghasilan/bln:</label>
                <input type="number" class="form-control" name="penghasilan" id="edit_penghasilan">
                <small class="edit_errorPenghasilan text-danger hidden"></small>
              </div>
              <div class="form-group">
                <label for="pdf" class="col-form-label">PDF <small class="text-muted">*kosongkan jika tidak akan diubah</small>:</label> <br/>
                <input type="file" id="edit_pdf" name="pdf" />
                <small class="edit_errorPdf text-danger hidden"></small>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col s6">
                      <a href="" class="btn btn-dark btn-sm btn-rounded" id="edit_showpdf" target="_blank">PDF Link</a>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="gambar" class="col-form-label">Upload Bentuk Kategori <small class="text-muted">*kosongkan jika tidak akan diubah</small>:</label> <br/>
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
          <button type="submit" class="btn btn-warning" id="updateBtn">Ubah Anggota</button>
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
    ajax: "{{ route('pengurus.penerima.index') }}",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'nama', name: 'nama'},
        {data: 'alamat', name: 'alamat'},
        {data: 'tgl_lahir', name: 'tgl_lahir'},
        {data: 'jenkel', name: 'jenkel'},
        {data: 'umur', name: 'umur'},
        {data: 'jumkel', name: 'jumkel'},
        {data: 'penghasilan', name: 'penghasilan', render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp. ' )},
        {data: 'pdf', name: 'pdf', 
          render: function( data, type, full, meta ) {
                    if(data == null){
                      return '<small class="text-muted">Belum upload</small>';
                    }else{
                      return "<a class='btn btn-rounded btn-dark btn-sm' href=\"{{Storage::url('public/penerima/pdf/')}}" + data + "\" target='_blank'>pdf</a>"; 
                    }
                  }},
        {data: 'gambar', name: 'gambar', 
          render: function( data, type, full, meta ) {
                    if(data == null){
                      return '<small class="text-muted">Belum upload</small>';
                    }else{
                      return "<img src=\"{{Storage::url('public/penerima/photos/')}}" + data + "\" width=\"50\" height=\"50\"/>"; 
                    }
                  }},
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
        $('.errorNama').hide();
        $('.errorAlamat').hide();
        $('.errorTglLahir').hide();
        $('.errorJenkel').hide();
        $('.errorUmur').hide();
        $('.errorJumkel').hide();
        $('.errorPenghasilan').hide();
        $('.errorJumkel').hide();
        $('.errorPdf').hide();
        $('.errorGambar').hide();
        $(this).html('Sending..');
    
        $.ajax({
          // data: frm.serialize(),
          data: new FormData($("#tambahForm")[0]),
          url: "{{ route('pengurus.penerima.store') }}",
          type: "POST",
          dataType: 'json',
          processData: false,
          contentType: false,
          success: function (data) {
            if (data.errors) {
                if (data.errors.nama) {
                  $('.errorNama').show();
                  $('.errorNama').text(data.errors.nama);
                }
                if (data.errors.alamat) {
                  $('.errorAlamat').show();
                  $('.errorAlamat').text(data.errors.alamat);
                }
                if (data.errors.tgl_lahir) {
                  $('.errorTglLahir').show();
                  $('.errorTglLahir').text(data.errors.tgl_lahir);
                }
                if (data.errors.jenkel) {
                  $('.errorJenkel').show();
                  $('.errorJenkel').text(data.errors.jenkel);
                }
                if (data.errors.umur) {
                  $('.errorUmur').show();
                  $('.errorUmur').text(data.errors.umur);
                }
                if (data.errors.jumkel) {
                  $('.errorJumkel').show();
                  $('.errorJumkel').text(data.errors.jumkel);
                }
                if (data.errors.penghasilan) {
                  $('.errorPenghasilan').show();
                  $('.errorPenghasilan').text(data.errors.penghasilan);
                }
                if (data.errors.penghasilan) {
                  $('.errorPdf').show();
                  $('.errorPdf').text(data.errors.pdf);
                }
                if (data.errors.penghasilan) {
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
                $('#editForm').trigger("reset");
                $('#edit_id').val(data.id_penerima);
                $('#edit_nama').val(data.nama);
                $('#edit_alamat').val(data.alamat);
                $('#edit_tgl_lahir').val(data.tgl_lahir);
                $("#edit_jenkel").val(data.jenkel);
                $('#edit_umur').val(data.umur);
                $('#edit_jumkel').val(data.jumkel);
                $('#edit_penghasilan').val(data.penghasilan);
                $('#edit_showpdf').attr('href', '{{Storage::url("penerima/pdf/")}}'+data.pdf);
                $('#edit_showgambar').attr('src', '{{Storage::url("penerima/photos/")}}'+data.gambar);
                $('.errorNama').hide();
                $('.errorAlamat').hide();
                $('.errorTglLahir').hide();
                $('.errorJenkel').hide();
                $('.errorUmur').hide();
                $('.errorJumkel').hide();
                $('.errorPenghasilan').hide();
                $('#editModal').modal('show');
            }
        });
    });

    // Update button in modal dialog
    $('#updateBtn').click(function(e){
        e.preventDefault();
        $('.edit_errorNama').hide();
        $('.edit_errorAlamat').hide();
        $('.edit_errorTglLahir').hide();
        $('.edit_errorJenkel').hide();
        $('.edit_errorUmur').hide();
        $('.edit_errorJumkel').hide();
        $('.edit_errorPenghasilan').hide();
        $('.edit_errorPdf').hide();
        $('.edit_errorGambar').hide();
        var url = "/pengurus/penerima/"+$('#edit_id').val();
        var frm = $('#editForm');
        var formdata = new FormData($("#editForm")[0]);
        formdata.append('_method', 'PUT');
        $(this).html('Sending..');
        

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
                if (data.errors.nama) {
                  $('.edit_errorNama').show();
                  $('.edit_errorNama').text(data.errors.nama);
                }
                if (data.errors.alamat) {
                  $('.edit_errorAlamat').show();
                  $('.edit_errorAlamat').text(data.errors.alamat);
                }
                if (data.errors.tgl_lahir) {
                  $('.edit_errorTglLahir').show();
                  $('.edit_errorTglLahir').text(data.errors.tgl_lahir);
                }
                if (data.errors.jenkel) {
                  $('.edit_errorJenkel').show();
                  $('.edit_errorJenkel').text(data.errors.jenkel);
                }
                if (data.errors.umur) {
                  $('.edit_errorUmur').show();
                  $('.edit_errorUmur').text(data.errors.umur);
                }
                if (data.errors.jumkel) {
                  $('.edit_errorJumkel').show();
                  $('.edit_errorJumkel').text(data.errors.jumkel);
                }
                if (data.errors.penghasilan) {
                  $('.edit_errorPenghasilan').show();
                  $('.edit_errorPenghasilan').text(data.errors.penghasilan);
                }
                if (data.errors.pdf) {
                  $('.edit_errorPdf').show();
                  $('.edit_errorPdf').text(data.errors.pdf);
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
                      swal("Deleted!", "Penerima data has been deleted", "success");
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