<div class="modal fade" id="detailModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="tambahData" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="detailData">Detail</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="contentDetail">

        </div>
      </div>
    </div>
  </div>
</div>

<script>
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.activity.index') }}",
            columns: [
                {data: 'description', name: 'description'},
                {data: 's', name: 's',
                    render: function( data, type, full, meta ) {
                        if(data != null){
                            return "<span class='badge badge-dark'>"+ data['subject_id'] +
                                   "</span> <span class='badge badge-info'>"+ data['subject_type'] +"</span>";
                        }else{
                            return "<span class='badge badge-danger'>null</span>";
                        }
                    }
                },
                {data: 'c', name: 'c', 
                    render: function( data, type, full, meta ) {
                        if(data != null){
                            return "<span class='badge badge-dark'>"+ data['causer_id'] + "</span> " +
                                   "<span class='badge badge-info'>"+ data['causer_type'] + "</span> " +
                                   "<span class='badge badge-dark'>"+ data['causer_name'] + "</span> " +
                                   "<span class='badge badge-light'>"+ data['causer_role'] + "</span> ";
                        }else{
                            return "<span class='badge badge-danger'>null</span>";
                        }
                    }
                },
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        // Edit button to show modal dialog
        $('#table').on('click','.detailBtn[data-id]',function(e){
            e.preventDefault();
            var url = $(this).data('id');
            $.ajax({
                url : url,
                type : 'GET',
                datatype : 'json',
                success:function(data){
                    if(data.attributes == null){
                        $('#contentDetail').html('<div class="text-center">Nothing</div>');
                    }else{
                        var htm = '<div class="table-responsive">';
                            htm += '<table class="table table-xs mb-0 table-borderless text-center">';
                            htm += '<tr>';
                            htm += '<th width="30%">New Attribut</th>';
                            htm += '<td>'+JSON.stringify(data.attributes).replace(/"|{|}/g,' ').replace(/,/g, '<br>')+'</td>';
                            htm += '</tr>';
                            if(data.old != null){
                                htm += '<tr>';
                                htm += '<th width="30%">Old</th>';
                                htm += '<td>'+JSON.stringify(data.old).replace(/"|{|}/g,' ').replace(/,/g, '<br>')+'</td>';
                                htm += '</tr>';
                            }
                            htm += '</table>';
                            htm += '</div>';
                        $('#contentDetail').html(htm);
                    }
                    $('#detailModal').modal('show');
                }
            });
        });
    });
  </script>