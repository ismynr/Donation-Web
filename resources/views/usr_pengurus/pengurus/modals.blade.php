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
          <form id="tambahForm" action="{{ Route('pengurus.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name" class="col-form-label">NIP:</label>
              <input type="number" class="form-control" name="nip" required>
            </div>
            <div class="form-group">
              <label for="name" class="col-form-label">Nama:</label>
              <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label for="country" class="col-form-label">Jabatan:</label>
                <input type="text" class="form-control" name="jabatan" required>
            </div>
            <div class="form-group">
              <label for="name" class="col-form-label">Email:</label>
              <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
              <label for="name" class="col-form-label">Password:</label>
              <input type="password" class="form-control" name="password" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Anggota</button>
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
          <form id="editForm" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
              <label for="name" class="col-form-label">NIP:</label>
              <input type="number" class="form-control" name="nip" required>
            </div>
              <div class="form-group">
                <label for="name" class="col-form-label">Nama:</label>
                <input type="text" class="form-control" name="nama" required>
              </div>
              <div class="form-group">
                  <label for="country" class="col-form-label">Jabatan:</label>
                  <input type="text" class="form-control" name="jabatan" required>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning" data-id="">Ubah Anggota</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="confirmHapusModal" tabindex="-1" data-backdrop="static"   role="dialog" aria-labelledby="hapusData" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white" id="hapusData">Hapus Data</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin ingin menghapus data ini ?</p>
        </div>
        <div class="modal-footer">
          <form id="hapusForm" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger btnHapus" data-id="">Hapus</button>
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
                  $('.errorTglLahir').show();
                  $('.errorTglLahir').text(data.errors.jabatan);
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
                $('.errorNip').hide();
                $('.errorNama').hide();
                $('.errorJabatan').hide();
                $('#editModal').modal('show');
            }
        });
    });

    // Update button in modal dialog
    $('#updateBtn').click(function(e){
        e.preventDefault();
        $('.errorNip').hide();
        $('.errorNama').hide();
        $('.errorJabatan').hide();
        var url = "/pengurus/pengurus/"+$('#edit_id').val();
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
                  $('.errorNip').show();
                  $('.errorNip').text(data.errors.nip);
                }
                if (data.errors.nama) {
                  $('.errorNama').show();
                  $('.errorNama').text(data.errors.nama);
                }
                if (data.errors.jabatan) {
                  $('.errorTglLahir').show();
                  $('.errorTglLahir').text(data.errors.jabatan);
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