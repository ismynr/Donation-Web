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
        ajax: "{{ route('category.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_kategori', name: 'nama_kategori'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    // Add button to show modal dialog
    $('.tambahModal').click(function(){
      $('#storeBtn').html('Tambah');
      $('#tambahForm').trigger("reset");
    });

    // Save Button in modal dialog
    $('#storeBtn').click(function (e) {
        e.preventDefault();
        var frm = $('#tambahForm');
        $('.errorNama_kategori').hide();
        $(this).html('Sending..');
    
        $.ajax({
          data: frm.serialize(),
          url: "{{ route('category.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
            if (data.errors) {
                if (data.errors.nama_kategori) {
                  $('.errorNama_kategori').show();
                  $('.errorNama_kategori').text(data.errors.nama_kategori);
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
                $('#edit_id').val(data.id_kategori);
                console.log(data)
                $('#edit_nama_kategori').val(data.nama_kategori);
                $('.edit_errorNama_kategori').hide();
                $('#editModal').modal('show');
            }
        });
    });

    // Update button in modal dialog
    $('#updateBtn').click(function(e){
        e.preventDefault();
        $('.edit_errorNama_kategori').hide();
        var url = "/pengurus/category/"+$('#edit_id').val();
        var frm = $('#editForm');

        $.ajax({
            data : frm.serialize(),
            type :'PUT',
            url : url,
            dataType : 'json',
            success:function(data){
              if (data.errors) {
                if (data.errors.edit_name) {
                    $('.edit_errorNama_kategori').show();
                    $('.edit_errorNama_kategori').text(data.errors.edit_name);
                }
              }else {
                $('.edit_errorNama_kategori').addClass('hidden');
                frm.trigger('reset');
                $('#editModal').modal('hide');
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

  });
</script>