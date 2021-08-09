@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" href="/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <div class="container">

      
      <div  class="row">
        <div class="col-md-6" style="float: left;">
            <h1>My Appointments</h1>
        </div>
        <div class="col-md-6" >
            <a href="/appointment/create" class="btn btn-primary" style="float: right;">CREATE</a>
        </div>
      </div>
  
      <table class="table table-bordered data-table">
  
          <thead>
              <tr>
                  <th>Vehicle Type</th>
                  <th>Make</th>
                  <th>Model</th>
                  <th>Details</th>
                  <th width="120px">Action</th>
              </tr>
          </thead>
        
          <tbody></tbody>
  
      </table>
  
  </div>




<script src="/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/admin-lte/plugins/jszip/jszip.min.js"></script>
<script src="/admin-lte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/admin-lte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/admin-lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<script type="text/javascript">

  $(document).ready(function() {

        $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
        });


       var table = $('.data-table').DataTable({

        processing: true,

        serverSide: true,

        ajax: "/appointment/index",

        columns: [

            {data: 'vehicle_type', name: 'Type'},
            {data: 'make', name: 'Make'},
            {data: 'model', name: 'Model'},
            {data: 'details', name: 'Details'},
            {data: 'action', name: 'action', width:250, orderable: false, searchable: false},

        ]

    });


    $(document).on('click', '.delete_appointments', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');

        swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this appointment!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.value) {

                $.ajax({
                    type: "POST",
                    data: {id:id},
                    url: "/appointment/delete",
                    success: function(data){

                        swal.fire(
                            'Deleted!',
                            'Appointment has been deleted.',
                            'success'
                        )
                        
                        table.ajax.reload();
                       
                    }
                });

            }
        })
    });


    
  });

  // $(function () {
 

    

  // });

</script>
@endsection