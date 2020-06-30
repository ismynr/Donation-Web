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
              <label for="name" class="col-form-label">Nama Kategori:</label>
              <input type="text" class="form-control" name="nama_kategori">
              <small class="errorNama_kategori text-danger hidden"></small>
          </div>
          <div class="form-group">
            <label for="pdf" class="col-form-label">PDF:</label> <br/>
            <input type="file" id="pdf" name="pdf" />
            <small class="errorPdf text-danger hidden"></small>
          </div>
          <div class="form-group">
            <label for="gambar" class="col-form-label">Upload Bentuk Kategori:</label> <br/>
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
              <label for="name" class="col-form-label">Nama Kategori:</label>
              <input type="text" id="edit_nama_kategori" class="form-control" name="nama_kategori">
              <small class="edit_errorNama_kategori text-danger hidden"></small>
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
        ajax: "{{ route('pengurus.category.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_kategori', name: 'nama_kategori'},
            {data: 'gambar', name: 'gambar', 
              render: function( data, type, full, meta ) {
                        if(data == null){
                          return '<small class="text-muted">Belum upload</small>';
                        }else{
                          return "<img src=\"{{Storage::url('public/category/photos/')}}" + data + "\" width=\"50\" height=\"50\"/>"; 
                        }
                      }},
            {data: 'pdf', name: 'pdf', 
              render: function( data, type, full, meta ) {
                        if(data == null){
                          return '<small class="text-muted">Belum upload</small>';
                        }else{
                          return "<a class='btn btn-rounded btn-dark btn-sm' href=\"{{Storage::url('public/category/pdf/')}}" + data + "\" target='_blank'>pdf</a>"; 
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
        $('.errorNama_kategori').hide();
        $('.errorGambar').hide();
        $('.errorPdf').hide();
        $(this).html('Sending..');
    
        $.ajax({
          // data: frm.serialize(),
          data : new FormData($("#tambahForm")[0]),
          dataType : 'json',
          processData: false,
          contentType: false,
          url: "{{ route('pengurus.category.store') }}",
          method: "POST",
          success: function (data) {
            if (data.errors) {
              console.log(data);
                if (data.errors.nama_kategori) {
                  $('.errorNama_kategori').show();
                  $('.errorNama_kategori').text(data.errors.nama_kategori);
                }
                if (data.errors.gambar) {
                  $('.errorGambar').show();
                  $('.errorGambar').text(data.errors.gambar);
                }
                if (data.errors.pdf) {
                  $('.errorPdf').show();
                  $('.errorPdf').text(data.errors.pdf);
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
                $('#edit_id').val(data.id_kategori);
                $('#edit_nama_kategori').val(data.nama_kategori);
                $('#edit_showgambar').attr('src', '{{Storage::url("category/photos/")}}'+ data.gambar);
                $('#edit_showpdf').attr('href', '{{Storage::url("category/pdf/")}}'+data.pdf);
                $('.edit_errorNama_kategori').hide();
                $('#editModal').modal('show');
            }
        });
    });

    // Update button in modal dialog
    $('#updateBtn').click(function(e){
        e.preventDefault();
        var frm = $('#editForm');
        $('.edit_errorNama_kategori').hide();
        $('.edit_errorGambar').hide();
        $('.edit_errorPdf').hide();
        var url = "/pengurus/category/"+$('#edit_id').val();
        var formdata = new FormData($("#editForm")[0]);
        formdata.append('_method', 'PUT');
        $(this).html('Sending..');

        $.ajax({                       
            method :'POST',
            url : url,
            data : formdata,
            dataType : 'json',
            processData: false,
            contentType: false,
            success:function(data){
              if (data.errors) {
                if (data.errors.nama_kategori) {
                    $('.edit_errorNama_kategori').show();
                    $('.edit_errorNama_kategori').text(data.errors.nama_kategori);
                }
                if (data.errors.gambar){
                  $('.edit_errorGambar').show();
                  $('.edit_errorGambar').text(data.errors.gambar);
                }
                if (data.errors.pdf){
                  $('.edit_errorPdf').show();
                  $('.edit_errorPdf').text(data.errors.pdf);
                }
              }else {
                $('.edit_errorNama_kategori').addClass('hidden');
                frm.trigger('reset');
                $('#editModal').modal('hide');
                swal('Success!','Data Updated Successfully','success');
                table.ajax.reload(null,false);
              }
              $('#updateBtn').html('Ubah');
            },
            error: function (jqXHR, textStatus, errorThrown) {
              $('#updateBtn').html('Ubah');
              alert('Please Reload to read Ajax');
              console.log("ERROR : ", e);
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