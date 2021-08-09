@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" href="admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <div class="container">

      <h1>AutoMax Customers</h1>
  
      <table class="table table-bordered data-table">
  
          <thead>
  
              <tr>
  
                  <th>No</th>
  
                  <th>Name</th>
  
                  <th>Email</th>

                  <th>Id</th>
  
                  <th width="120px">Action</th>
  
              </tr>
  
          </thead>
  
          <tbody>
  
          </tbody>
  
      </table>
  
  </div>




<script src="admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="admin-lte/plugins/jszip/jszip.min.js"></script>
<script src="admin-lte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="admin-lte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="admin-lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<script type="text/javascript">

  $(document).ready(function() {
       var table = $('.data-table').DataTable({

        processing: true,

        serverSide: true,

        ajax: "{{ route('users.index') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},

            {data: 'name', name: 'name'},

            {data: 'email', name: 'email'},

            {data: 'id' , name: 'id'}, 

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });
  });

  // $(function () {
 

    

  // });

</script>
@endsection