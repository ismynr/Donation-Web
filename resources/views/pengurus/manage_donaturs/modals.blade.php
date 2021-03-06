<!-- ADD ITEM MODAL -->
<div class="modal fade" id="tambahModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="tambahData" aria-hidden="true">
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
              <label for="nama_depan" class="col-form-label">Nama Depan:</label>
              <input type="text" class="form-control" name="nama_depan">
              <small class="errorNama_depan text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="nama_belakang" class="col-form-label">Nama Belakang:</label>
              <input type="text" class="form-control" name="nama_belakang">
              <small class="errorNama_belakang text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="no_hp" class="col-form-label">No Handphone:</label>
              <input type="text" class="form-control" name="no_hp">
              <small class="errorNo_hp text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="umur" class="col-form-label">Umur:</label>
              <input type="text" class="form-control" name="umur">
              <small class="errorUmur text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="alamat" class="col-form-label">Alamat:</label>
              <textarea name="alamat" class="form-control" cols="30" rows="10"></textarea>
              <small class="errorAlamat text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="email" class="col-form-label">Email:</label>
              <input type="email" class="form-control" name="email">
              <small class="errorEmail text-danger hidden"></small>
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
              <label for="password" class="col-form-label">Password (DEFAULT):</label>
              <input type="text" class="form-control" name="password" disabled value="PASSWORD DISAMAKAN DENGAN EMAIL">
              <small class="errorPassword text-danger">dapat diganti sendiri saat login donatur tersebut, dibagian profile</small>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="storeBtn" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- EDIT ITEM MODAL -->
<div class="modal fade" id="editModal" tabindex="-1" data-backdrop="static"   role="dialog" aria-labelledby="editData" aria-hidden="true">
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
              <label for="nama_depan" class="col-form-label">Nama Depan:</label>
              <input type="text" id="edit_nama_depan" class="form-control" name="nama_depan">
              <small class="edit_errorNama_depan text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="nama_belakang" class="col-form-label">Nama Belakang:</label>
              <input id="edit_nama_belakang" type="text" class="form-control" name="nama_belakang">
              <small class="edit_errorNama_belakang text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="no_hp" class="col-form-label">No Handphone:</label>
              <input id="edit_no_hp" type="text" class="form-control" name="no_hp">
              <small class="edit_errorNo_hp text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="umur" class="col-form-label">Umur:</label>
              <input id="edit_umur" type="text" class="form-control" name="umur">
              <small class="edit_errorUmur text-danger hidden"></small>
          </div>
          <div class="form-group">
              <label for="alamat" class="col-form-label">Alamat:</label>
              <textarea id="edit_alamat" name="alamat" class="form-control" cols="30" rows="10"></textarea>
              <small class="edit_errorAlamat text-danger hidden"></small>
          </div>
          <div class="form-group">
            <label for="pdf" class="col-form-label">PDF <small class="text-muted">*kosongkan kalo gak mau diganti</small>:</label> <br/>
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
        <button type="submit" id="updateBtn" class="btn btn-warning" >Ubah</button>
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
        ajax: "{{ route('pengurus.donatur.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_depan', name: 'nama_depan'},
            {data: 'nama_belakang', name: 'nama_belakang'},
            {data: 'no_hp', name: 'no_hp'},
            {data: 'pdf', name: 'pdf', 
              render: function( data, type, full, meta ) {
                    if(data == null){
                      return '<small class="text-muted">Belum upload</small>';
                    }else{
                      return "<a class='btn btn-rounded btn-dark btn-sm' href=\"{{Storage::url('public/donatur/pdf/')}}" + data + "\" target='_blank'>pdf</a>"; 
                    }
                  }},
            {data: 'gambar', name: 'gambar', 
              render: function( data, type, full, meta ) {
                    if(data == null){
                      return '<small class="text-muted">Belum upload</small>';
                    }else{
                      return "<img src=\"{{Storage::url('public/donatur/photos/')}}" + data + "\" width=\"50\" height=\"50\"/>"; 
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
        $('.errorNama_depan').hide();
        $('.errorNama_belakang').hide();
        $('.errorNo_hp').hide();
        $('.errorUmur').hide();
        $('.errorAlamat').hide();
        $('.errorEmail').hide();
        $('.errorPdf').hide();
        $('.errorGambar').hide();
        $(this).html('Sending..');
    
        $.ajax({
          // data: frm.serialize(),
          data: new FormData($("#tambahForm")[0]),
          url: "{{ route('pengurus.donatur.store') }}",
          type: "POST",
          dataType: 'json',
          processData: false,
          contentType: false,
          success: function (data) {
            if (data.errors) {
                if (data.errors.nama_depan) {
                    $('.errorNama_depan').show();
                    $('.errorNama_depan').text(data.errors.nama_depan);
                }
                if (data.errors.nama_belakang) {
                    $('.errorNama_belakang').show();
                    $('.errorNama_belakang').text(data.errors.nama_belakang);
                }
                if (data.errors.no_hp) {
                    $('.errorNo_hp').show();
                    $('.errorNo_hp').text(data.errors.no_hp);
                }
                if (data.errors.umur) {
                    $('.errorUmur').show();
                    $('.errorUmur').text(data.errors.umur);
                }
                if (data.errors.alamat) {
                    $('.errorAlamat').show();
                    $('.errorAlamat').text(data.errors.alamat);
                }
                if (data.errors.email) {
                    $('.errorEmail').show();
                    $('.errorEmail').text(data.errors.email);
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
                $('#edit_id').val(data.id_donatur);
                console.log(data)
                $('#edit_nama_depan').val(data.nama_depan);
                $('#edit_nama_belakang').val(data.nama_belakang);
                $('#edit_no_hp').val(data.no_hp);
                $('#edit_umur').val(data.umur);
                $('#edit_alamat').val(data.alamat);
                $('#edit_email').val(data.email);
                $('#edit_showpdf').attr('href', '{{Storage::url("donatur/pdf/")}}'+data.pdf);
                $('#edit_showgambar').attr('src', '{{Storage::url("donatur/photos/")}}'+data.gambar);
                $('.edit_errorNama_depan').hide();
                $('.edit_errorNama_belakang').hide();
                $('.edit_errorNo_hp').hide();
                $('.edit_errorUmur').hide();
                $('.edit_errorAlamat').hide();
                $('.edit_errorEmail').hide();
                $('#editModal').modal('show');
            }
        });
    });

    // Update button in modal dialog
    $('#updateBtn').click(function(e){
        e.preventDefault();
        $('.edit_errorNama_depan').hide();
        $('.edit_errorNama_belakang').hide();
        $('.edit_errorNo_hp').hide();
        $('.edit_errorUmur').hide();
        $('.edit_errorAlamat').hide();
        $('.edit_errorEmail').hide();
        $('.edit_errorPdf').hide();
        $('.edit_errorGambar').hide();
        var url = "/pengurus/donatur/"+$('#edit_id').val();
        var frm = $('#editForm');
        var formdata = new FormData($("#editForm")[0]);
        formdata.append('_method', 'PUT');
        $(this).html('Sending..');
        
        $.ajax({
            // data : frm.serialize(),
            data : formdata,
            type :'POST',
            url : url,
            dataType : 'json',
            processData: false,
            contentType: false,
            success:function(data){
              if (data.errors) {
                if (data.errors.nama_depan) {
                    $('.edit_errorNama_depan').show();
                    $('.edit_errorNama_depan').text(data.errors.nama_depan);
                }
                if (data.errors.nama_belakang) {
                    $('.edit_errorNama_belakang').show();
                    $('.edit_errorNama_belakang').text(data.errors.nama_belakang);
                }
                if (data.errors.no_hp) {
                    $('.edit_errorNo_hp').show();
                    $('.edit_errorNo_hp').text(data.errors.no_hp);
                }
                if (data.errors.umur) {
                    $('.edit_errorUmur').show();
                    $('.edit_errorUmur').text(data.errors.umur);
                }
                if (data.errors.alamat) {
                    $('.edit_errorAlamat').show();
                    $('.edit_errorAlamat').text(data.errors.alamat);
                }
                if (data.errors.email) {
                    $('.edit_errorEmail').show();
                    $('.edit_errorEmail').text(data.errors.email);
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
              $('#updateBtn').html('Ubah');
            },
            error: function (jqXHR, textStatus, errorThrown) {
              $('#updateBtn').html('Ubah');
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

  });
</script>