<div class="modal fade" id="tambahModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="tambahData"
    aria-hidden="true">
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
                    <h5>User Profile</h5>
                    <hr>
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

                    <h5>User Account</h5>
                    <hr>

                    <div class="form-group">
                        <label for="name" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" name="email">
                        <small class="errorEmail text-danger hidden"></small>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password (DEFAULT):</label>
                        <input type="text" class="form-control" name="password" disabled
                            value="PASSWORD DISAMAKAN DENGAN EMAIL">
                        <small class="text-danger">dapat diganti sendiri saat login donatur tersebut, dibagian
                            profile</small>
                    </div>
                    <div class="form-group">
                        <label for="pdf" class="col-form-label">PDF :</label> <br />
                        <input type="file" class="form-control" name="pdf">
                        <small class="errorPdf text-danger hidden"></small>
                    </div>
                    <div class="form-group">
                        <label for="gambar" class="col-form-label">Upload Photo :</label> <br />
                        <input type="file" id="gambar" class="form-control" name="gambar">
                        <small class="errorGambar text-danger hidden"></small>
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

<div class="modal fade" id="editModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="editData"
    aria-hidden="true">
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
                    <h5>User Profile</h5>
                    <hr>
                    <div class="form-group">
                        <label for="name" class="col-form-label">NIP:</label>
                        <input type="number" id="edit_nip" class="form-control" name="nip">
                        <small class="edit_errorNip text-danger hidden"></small>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nama:</label>
                        <input type="text" id="edit_nama" class="form-control" name="nama">
                        <small class="edit_errorNama text-danger hidden"></small>
                    </div>
                    <div class="form-group">
                        <label for="country" class="col-form-label">Jabatan:</label>
                        <input type="text" id="edit_jabatan" class="form-control" name="jabatan">
                        <small class="edit_errorJabatan text-danger hidden"></small>
                    </div>

                    <h4>User Account</h4>
                    <hr>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email:</label>
                        <input id="edit_email" type="email" class="form-control" name="email">
                        <small class="edit_errorEmail text-danger hidden"></small>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" name="password" value="Reset Password" type="checkbox"
                                id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Reset Password !
                            </label>
                        </div>
                        <small class="text-danger">Password akan sama dengan email</small>
                    </div>
                    <div class="form-group">
                        <label for="pdf" class="col-form-label">PDF <small class="text-muted">*kosongkan jika tidak akan
                                diubah</small>:</label> <br />
                        <input type="file" id="edit_pdf" name="pdf" />
                        <small class="edit_errorPdf text-danger hidden"></small>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col s6">
                                <a href="" class="btn btn-dark btn-sm btn-rounded" id="edit_showpdf" target="_blank">PDF
                                    Link</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gambar" class="col-form-label">Upload Bentuk Kategori <small
                                class="text-muted">*kosongkan jika tidak akan diubah</small>:</label> <br />
                        <input type="file" id="edit_gambar" name="gambar" />
                        <small class="edit_errorGambar text-danger hidden"></small>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col s6">
                                <img src="http://placehold.it/100x100" class="showgambar" id="edit_showgambar"
                                    style="max-width:200px;max-height:200px;float:left;" />
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
            ajax: "{{ route('admin.pengurus.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nip',
                    name: 'nip'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'jabatan',
                    name: 'jabatan'
                },
                {
                    data: 'pdf',
                    name: 'pdf',
                    render: function (data, type, full, meta) {
                        if (data == null) {
                            return '<small class="text-muted">Belum upload</small>';
                        } else {
                            return "<a class='btn btn-rounded btn-dark btn-sm' href=\"{{Storage::url('public/pengurus/pdf/')}}" +
                                data + "\" target='_blank'>pdf</a>";
                        }
                    }
                },
                {
                    data: 'gambar',
                    name: 'gambar',
                    render: function (data, type, full, meta) {
                        if (data == null) {
                            return '<small class="text-muted">Belum upload</small>';
                        } else {
                            return "<img src=\"{{Storage::url('public/pengurus/photos/')}}" +
                                data + "\" width=\"50\" height=\"50\"/>";
                        }
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        // Add button to show modal dialog
        $('.tambahModal').click(function () {
            $('#storeBtn').html('Tambah');
            $('.showgambar').attr('src', 'http://placehold.it/100x100');
            $('#tambahForm').trigger("reset");
        });

        // Save Button in modal dialog
        $('#storeBtn').click(function (e) {
            e.preventDefault();
            var frm = $('#tambahForm');
            $('.errorNip').hide();
            $('.errorNama').hide();
            $('.errorJabatan').hide();
            $('.errorEmail').hide();
            $('.errorPdf').hide();
            $('.errorGambar').hide();
            $(this).html('Sending..');

            $.ajax({
                data: frm.serialize(),
                url: "{{ route('admin.pengurus.store') }}",
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
                        if (data.errors.pdf) {
                            $('.errorPdf').show();
                            $('.errorPdf').text(data.errors.pdf);
                        }
                        if (data.errors.gambar) {
                            $('.errorGambar').show();
                            $('.errorGambar').text(data.errors.gambar);
                        }
                    } else {
                        $('#tambahModal').modal('hide');
                        frm.trigger("reset");
                        table.draw();
                        swal('success!', 'Successfully Added', 'success');
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
        $('#table').on('click', '.editBtn[data-id]', function (e) {
            e.preventDefault();
            var url = $(this).data('id');
            $('#editForm').trigger("reset");
            $.ajax({
                url: url,
                type: 'GET',
                datatype: 'json',
                success: function (data) {
                    $('#edit_id').val(data.data.id_pengurus);
                    $('#edit_nip').val(data.data.nip);
                    $('#edit_nama').val(data.data.nama);
                    $('#edit_jabatan').val(data.data.jabatan);
                    $('#edit_email').val(data.user.email);
                    $('#edit_showpdf').attr('href', '{{Storage::url("pengurus/pdf/")}}' +
                        data.pdf);
                    $('#edit_showgambar').attr('src',
                        '{{Storage::url("pengurus/photos/")}}' + data.gambar);
                    $('.edit_errorNip').hide();
                    $('.edit_errorNama').hide();
                    $('.edit_errorJabatan').hide();
                    $('.edit_errorEmail').hide();
                    $('#editModal').modal('show');
                }
            });
        });

        // Update button in modal dialog
        $('#updateBtn').click(function (e) {
            e.preventDefault();
            $('.edit_errorNip').hide();
            $('.edit_errorNama').hide();
            $('.edit_errorJabatan').hide();
            $('.edit_errorEmail').hide();
            $('.edit_errorPdf').hide();
            $('.edit_errorGambar').hide();
            var url = "/admin/pengurus/" + $('#edit_id').val();
            var frm = $('#editForm');

            $.ajax({
                data: frm.serialize(),
                type: 'PUT',
                url: url,
                dataType: 'json',
                success: function (data) {
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
                        if (data.errors.email) {
                            $('.edit_errorEmail').show();
                            $('.edit_errorEmail').text(data.errors.email);
                        }
                        if (data.errors.pdf) {
                            $('.edit_errorPdf').show();
                            $('.edit_errorPdf').text(data.errors.pdf);
                        }
                        if (data.errors.gambar) {
                            $('.edit_errorGambar').show();
                            $('.edit_errorGambar').text(data.errors.gambar);
                        }
                    } else {
                        $('#editModal').modal('hide');
                        frm.trigger('reset');
                        swal('Success!', 'Data Updated Successfully', 'success');
                        table.ajax.reload(null, false);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Please Reload to read Ajax');
                }
            });
        });

        // Delete Or Destroy button to show sweetalert
        $('#table').on('click', '.deleteBtn[data-id]', function (e) {
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
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            dataType: 'json',
                            data: {
                                method: '_DELETE',
                                submit: true
                            },
                            success: function (data) {
                                if (data == 'Success') {
                                    swal("Deleted!", "Data has been deleted",
                                    "success");
                                    table.ajax.reload(null, false);
                                }
                            }
                        });
                    } else {
                        swal.close();
                    }
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
