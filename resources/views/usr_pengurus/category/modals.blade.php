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
          <form id="tambahForm" action="{{ Route('category.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="col-form-label">Nama Kategori:</label>
                <input type="text" class="form-control" name="nama_kategori" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Kategori</button>
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
                <label for="name" class="col-form-label">Nama Kategori:</label>
                <input type="text" class="form-control" name="nama_kategori" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning" data-id="">Ubah Kategori</button>
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
  $(".datepicker").datepicker({
    format: "yyyy-mm-dd",
    weekStart: 0,
    calendarWeeks: true,
    autoclose: true,
    todayHighlight: true,
    rtl: true,
    orientation: "auto"
  });
  $('.tambahModal').on('click', function(){
    $('#tambahForm')[0].reset();
  });
  $('.table tbody').on('click', '.editModal', function(){
    $('#editForm')[0].reset();
    var currow = $(this).closest('tr');
    var col2 = currow.find('td:eq(1)').text();
    var id = $(this).data('id');
    $('input[name$="nama_kategori"]').val(col2);      
    var url = '{{ route("category.update", ":id") }}';
    url = url.replace(':id', id);
    $('#editForm').attr('action' , url);
    $('#editModal').modal();
  });
  $('.table tbody').on('click', '.hapusModal', function(){
    var id = $(this).data('id');
    var url = '{{ route("category.destroy", ":id") }}';
    url = url.replace(':id', id);
    $('#hapusForm').attr('action' , url);
    $('#confirmHapusModal').modal("show");
  });
</script>