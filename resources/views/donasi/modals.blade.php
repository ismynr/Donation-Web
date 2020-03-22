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
          <form id="tambahForm" action="{{ Route('donasi.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="col-form-label">Kategori Donasi:</label>
                <select name="id_kategori" class="form-control" required>
                  <option value="" selected disabled>Pilih Kategori</option>
                    @foreach ($catDonasi as $data)
                    <option value="{{ $data['id_kategori'] }}" >{{ $data['nama_kategori'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name" class="col-form-label">Jumlah Donasi:</label>
                <input type="text" class="form-control" name="jumlah_donasi" required>
            </div>
            <div class="form-group">
                <label for="country" class="col-form-label">Nama Penerima:</label>
                <input type="text" class="form-control" name="nama_penerima" required>
            </div>
            <div class="form-group">
                <label for="city" class="col-form-label">Nama User:</label>
                <input type="text" class="form-control" name="nama_user" required>
            </div>
            <div class="form-group">
                <label for="city" class="col-form-label">Tanggal Pemberian:</label>
                <input type="text" class="form-control datepicker" name="tanggal_memberi" placeholder="ex: 2020-03-28" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Donasi</button>
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
                <label for="name" class="col-form-label">Kategori Donasi:</label>
                <select name="id_kategori" id="kategori-selectbox" class="form-control" required>
                  <option value="" selected disabled>Pilih Kategori</option>
                    @foreach ($catDonasi as $data)
                    <option value="{{ $data['id_kategori'] }}">{{ $data['nama_kategori'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name" class="col-form-label">Jumlah Donasi:</label>
                <input type="text" class="form-control" name="jumlah_donasi" required>
            </div>
            <div class="form-group">
                <label for="country" class="col-form-label">Nama Penerima:</label>
                <input type="text" class="form-control" name="nama_penerima" required>
            </div>
            <div class="form-group">
                <label for="city" class="col-form-label">Nama User:</label>
                <input type="text" class="form-control" name="nama_user" required>
            </div>
            <div class="form-group">
                <label for="city" class="col-form-label">Tanggal Pemberian:</label>
                <input type="text" class="form-control datepicker" name="tanggal_memberi" placeholder="ex: 2020-03-28" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning" data-id="">Ubah Donasi</button>
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
    var col3 = currow.find('td:eq(2)').text();
    var col4 = currow.find('td:eq(3)').text();
    var col5 = currow.find('td:eq(4)').text();
    var col6 = currow.find('td:eq(5)').text();
    var id = $(this).data('id');
    $('#kategori-selectbox option').each(function(){
        if (this.value == col2) {
            $(this).attr("selected","selected");
        }
    });
    $('input[name$="jumlah_donasi"]').val(col3);
    $('input[name$="nama_penerima"]').val(col4);
    $('input[name$="nama_user"]').val(col5);
    $('input[name$="tanggal_memberi"]').val(col6);        
    var url = '{{ route("donasi.update", ":id") }}';
    url = url.replace(':id', id);
    $('#editForm').attr('action' , url);
    $('#editModal').modal();
  });
  $('.table tbody').on('click', '.hapusModal', function(){
    var id = $(this).data('id');
    var url = '{{ route("donasi.destroy", ":id") }}';
    url = url.replace(':id', id);
    $('#hapusForm').attr('action' , url);
    $('#confirmHapusModal').modal("show");
  });
</script>