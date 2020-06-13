<div class="modal fade" id="tambahModal" tabindex="-1" data-backdrop="static"   role="dialog" aria-labelledby="tambahData" aria-hidden="true">
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
              <label for="name" class="col-form-label">NIP:</label>
              <input type="number" class="form-control" name="nip">
              <small class="errorNip text-danger hidden"></small>
            </div>
            <div class="form-group">
              <label for="name" class="col-form-label">Nama:</label>
              <input type="text" class="form-control" name="nama">
              <small class="errorNama text-danger hidden"></small>
            </div>
            <div class="form-group">
                <label for="country" class="col-form-label">Jabatan:</label>
                <input type="text" class="form-control" name="jabatan">
                <small class="errorJabatan text-danger hidden"></small>
            </div>
            <div class="form-group">
              <label for="name" class="col-form-label">Email:</label>
              <input type="email" class="form-control" name="email">
              <small class="errorEmail text-danger hidden"></small>
            </div>
            <div class="form-group">
              <label for="name" class="col-form-label">Password:</label>
              <input type="password" class="form-control" name="password">
              <small class="errorPassword text-danger hidden"></small>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="storeBtn">Tambah Anggota</button>
            </form>
        </div>
      </div>
    </div>
  </div>

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
              <label for="name" class="col-form-label">NIP:</label>
              <input type="number" id="edit_nip"  class="form-control" name="nip">
              <small class="edit_errorNip text-danger hidden"></small>
            </div>
              <div class="form-group">
                <label for="name" class="col-form-label">Nama:</label>
                <input type="text" id="edit_nama"  class="form-control" name="nama">
                <small class="edit_errorNama text-danger hidden"></small>
              </div>
              <div class="form-group">
                  <label for="country" class="col-form-label">Jabatan:</label>
                  <input type="text" id="edit_jabatan"  class="form-control" name="jabatan">
                  <small class="edit_errorJabatan text-danger hidden"></small>
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
    ajax: "{{ route('pengurus.index') }}",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'nip', name: 'nip'},
        {data: 'nama', name: 'nama'},
        {data: 'jabatan', name: 'jabatan'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
});

// Save Button in modal dialog
$('#storeBtn').click(function (e) {
        e.preventDefault();
        var frm = $('#tambahForm');
        $('.errorNip').hide();
        $('.errorNama').hide();
        $('.errorJabatan').hide();
        $('.errorEmail').hide();
        $('.errorPassword').hide();
        $(this).html('Sending..');
    
        $.ajax({
          data: frm.serialize(),
          url: "{{ route('pengurus.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
            if (data.errors) {
                if (data.errors.nip) {
                  $('.errorNip').show();
                  $('.errorNip').text(data.errors.nip);
                }
                if (data.errors.nama) {
                  $('.errorNama').show();
                  $('.errorNama').text(data.errors.nama);
                }
                if (data.errors.jabatan) {
                  $('.errorJabatan').show();
                  $('.errorJabatan').text(data.errors.jabatan);
                }
                if (data.errors.email) {
                  $('.errorEmail').show();
                  $('.errorEmail').text(data.errors.email);
                }
                if (data.errors.password) {
                  $('.errorPassword').show();
                  $('.errorPassword').text(data.errors.jabatan);
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
                $('#edit_id').val(data.id_pengurus);
                $('#edit_nip').val(data.nip);
                $('#edit_nama').val(data.nama);
                $('#edit_jabatan').val(data.jabatan);
                $('.edit_errorNip').hide();
                $('.edit_errorNama').hide();
                $('.edit_errorJabatan').hide();
                $('#editModal').modal('show');
            }
        });
    });

    // Update button in modal dialog
    $('#updateBtn').click(function(e){
        e.preventDefault();
        $('.edit_errorNip').hide();
        $('.edit_errorNama').hide();
        $('.edit_errorJabatan').hide();
        var url = "/admin/pengurus/"+$('#edit_id').val();
        console.log(url);
        var frm = $('#editForm');

        $.ajax({
            data : frm.serialize(),
            type :'PUT',
            url : url,
            dataType : 'json',
            success:function(data){
              if (data.errors) {
                if (data.errors.nip) {
                  $('.edit_errorNip').show();
                  $('.edit_errorNip').text(data.errors.nip);
                }
                if (data.errors.nama) {
                  $('.edit_errorNama').show();
                  $('.edit_errorNama').text(data.errors.nama);
                }
                if (data.errors.jabatan) {
                  $('.edit_errorJabatan').show();
                  $('.edit_errorJabatan').text(data.errors.jabatan);
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
        console.log(url);
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
                      swal("Deleted!", "Data has been deleted", "success");
                      table.ajax.reload(null,false);
                    }
                }
            });
          }else { swal.close(); }
        });
    });
  });
    
</script>