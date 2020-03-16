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
          <form id="tambahForm" action="{{ Route('data.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="col-form-label">Name:</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="form-group">
                  <label for="country" class="col-form-label">Country:</label>
                  <input type="text" class="form-control" name="country" required>
                </div>
                <div class="form-group">
                  <label for="city" class="col-form-label">City:</label>
                  <input type="text" class="form-control" name="city" required>
                </div>
              <div class="form-group">
                <label for="phone" class="col-form-label">Phone:</label>
                <input type="text" class="form-control" name="phone" required>
              </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
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
              <label for="name" class="col-form-label">Name:</label>
              <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="country" class="col-form-label">Country:</label>
                <input type="text" class="form-control" name="country" required>
              </div>
              <div class="form-group">
                <label for="city" class="col-form-label">City:</label>
                <input type="text" class="form-control" name="city" required>
              </div>
            <div class="form-group">
              <label for="phone" class="col-form-label">Phone:</label>
              <input type="text" class="form-control" name="phone" required>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Ubah Data</button>
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
            <button type="submit" class="btn btn-danger btnHapus" data-nope="">Hapus</button>
        </form>
        </div>
      </div>
    </div>
  </div>

<script>
    $('.tambahModal').on('click', function(){
        $('#tambahForm')[0].reset();
    });

    $('.table tbody').on('click', '.editModal', function(){
        $('#editForm')[0].reset();
        var currow = $(this).closest('tr');
        var col2 = currow.find('td:eq(1)').text();
        var col3 = currow.find('td:eq(2)').text();
        var col4 = currow.find('td:eq(3)').text();
        var col5 = currow.find('td:eq(4)').text();
        $('input[name$="name"]').val(col2);
        $('input[name$="country"]').val(col3);
        $('input[name$="city"]').val(col4);
        $('input[name$="phone"]').val(col5);
        
        var url = '{{ route("data.update", ":nope") }}';
        url = url.replace(':nope', col5);
        $('#editForm').attr('action' , url);
        $('#editModal').modal();
    });

    $('.table tbody').on('click', '.hapusModal', function(){
      var nope = $(this).data('nope');
      var url = '{{ route("data.destroy", ":nope") }}';
      url = url.replace(':nope', nope);
      $('.formHapusModal').attr('action' , url);
      $('#confirmHapusModal').modal("show");
    });
    
    
</script>