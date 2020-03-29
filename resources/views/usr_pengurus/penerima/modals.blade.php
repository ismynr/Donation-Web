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
          <form id="tambahForm" action="{{ Route('penerima.store') }}" method="POST">
            {{ csrf_field() }}
              <div class="form-group">
                <label for="name" class="col-form-label">Name:</label>
                <input type="text" class="form-control" name="nama" required>
              </div>
              <div class="form-group">
                  <label for="country" class="col-form-label">Alamat:</label>
                  <input type="text" class="form-control" name="alamat" required>
              </div>
              <div class="form-group">
                <label for="city" class="col-form-label">Tanggal lahir:</label>
                <input type="date" class="form-control" name="tgl_lahir" required>
              </div>
              <div class="form-group">
                  <label for="country" class="col-form-label">Jenis Kelamin:</label>
                  <select class="form-control" name="jenkel">
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="city" class="col-form-label">Umur:</label>
                <input type="number" class="form-control" name="umur" required>
              </div>
              <div class="form-group">
                <label for="city" class="col-form-label">Jumlah Keluarga:</label>
                <input type="number" class="form-control" name="jumkel" required>
              </div>
              <div class="form-group">
                <label for="city" class="col-form-label">Penghasilan/bln:</label>
                <input type="number" class="form-control" name="penghasilan" required>
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
                <label for="name" class="col-form-label">Name:</label>
                <input type="text" class="form-control" name="nama" required>
              </div>
              <div class="form-group">
                  <label for="country" class="col-form-label">Alamat:</label>
                  <input type="text" class="form-control" name="alamat" required>
              </div>
              <div class="form-group">
                <label for="city" class="col-form-label">Tanggal lahir:</label>
                <input type="date" class="form-control" name="tgl_lahir" required>
              </div>
              <div class="form-group">
                  <label for="country" class="col-form-label">Jenis Kelamin:</label>
                  <select class="form-control" name="jenkel">
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="city" class="col-form-label">Umur:</label>
                <input type="number" class="form-control" name="umur" required>
              </div>
              <div class="form-group">
                <label for="city" class="col-form-label">Jumlah Keluarga:</label>
                <input type="number" class="form-control" name="jumkel" required>
              </div>
              <div class="form-group">
                <label for="city" class="col-form-label">Penghasilan/bln:</label>
                <input type="number" class="form-control" name="penghasilan" required>
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
            <button type="submit" class="btn btn-danger btnHapus" data-id="">Hapus Anggota</button>
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
        var col6 = currow.find('td:eq(5)').text();
        var col7 = currow.find('td:eq(6)').text();
        var col8 = currow.find('td:eq(7)').text();
        var id = $(this).data('id');
        $('input[name$="nama"]').val(col2);
        $('input[name$="alamat"]').val(col3);
        $('input[name$="tgl_lahir"]').val(col4);
        $('input[name$="jenkel"]').val(col5);
        $('input[name$="umur"]').val(col6);        
        $('input[name$="jumkel"]').val(col7);
        $('input[name$="penghasilan"]').val(col8);
        
        var url = '{{ route("penerima.update", ":id") }}';
        url = url.replace(':id', id);
        $('#editForm').attr('action' , url);
        $('#editModal').modal();
    });

    $('.table tbody').on('click', '.hapusModal', function(){
      var id = $(this).data('id');
      var url = '{{ route("penerima.destroy", ":id") }}';
      url = url.replace(':id', id);
      $('#hapusForm').attr('action' , url);
      $('#confirmHapusModal').modal("show");
    });
    
    
</script>