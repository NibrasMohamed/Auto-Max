@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="/css/app.css">

<style>
  .card-title-right-success{
    float:right;
    background: #28a745;
    padding: 10px;
    border-radius: 20px;
    color: white;
    font-weight: 600;
  }
  .card-title-right-warning{
    float:right;
    background: #FFC107;
    padding: 10px;
    border-radius: 20px;
    color: white;
    font-weight: 600;
  }
  .card-title-right-danger{
    float:right;
    background: #dc3545;
    padding: 10px;
    border-radius: 20px;
    color: white;
    font-weight: 600;
  }

  
</style>


<div class="custom-container">
  <div class="row">
    <div class="col-md-6">
      <h3>Appointment Status</h3>
    </div>
    
    @if (!$read_only)
      <div class="col-md-6">
        <a style="float: right;" href="/appointment/details/create?project_id={{$project->id}}" class="btn btn-primary">Create Activuty</a>
      </div>
    @endif
   
  </div>
  
  <div class="card card-primary card-outline">
    <div class="card-header">
      <h2 class="card-title" style="font-size: xx-large;">{{$project->make}} - {{$project->model}}</h2>
  
      @if($project->status == 'aproved')
        <div class="card-title-right-danger">
          Pending
        </div>
      @elseif($project->status == 'in_progress')
        <div class="card-title-right-warning">
          In Progress
        </div>
      @elseif($project->status == 'completed')
        <div class="card-title-right-success">
          Completed
        </div>
      @endif
      
    </div> <!-- /.card-body -->
    <div class="card-body">
      

        <div class="row">
          <div class="col">
            <ol class="stepper">
              <li class="step {{($project->progress == 0 ? 'current' : '')}} {{($project->progress > 0 ? 'past' : '')}} {{($project->progress < 0 ? 'future' : '')}} ">0%</li>
              <li class="step {{($project->progress == 25 ? 'current' : '')}} {{($project->progress > 25 ? 'past' : '')}} {{($project->progress < 25 ? 'future' : '')}} ">25%</li>
              <li class="step {{($project->progress == 50 ? 'current' : '')}} {{($project->progress > 50 ? 'past' : '')}} {{($project->progress < 50 ? 'future' : '')}} ">50%</li>
              <li class="step {{($project->progress == 75 ? 'current' : '')}} {{($project->progress > 75 ? 'past' : '')}} {{($project->progress < 75 ? 'future' : '')}} ">75%</li>
              <li class="step {{($project->progress == 100 ? 'current' : '')}} {{($project->progress > 100 ? 'past' : '')}} {{($project->progress < 100 ? 'future' : '')}} ">100%</li>
            </ol>
          </div>
        </div>
        <hr>


      <div class="row">
        
        <div class="col-md-8">
          <div>
            <strong>Vehicle Type:</strong> 
          </div>
          <div>
            <strong>Make:</strong> {{$project->make}}
          </div>
          <div>
            <strong>Model:</strong> {{$project->model}}
          </div>
          <div>
            <strong>Description:</strong> {{$project->details}}
          </div>
          <div>
            <strong>Job Type:</strong> {{$project->vehicle_type}}
            <ul>
              <li>Touch-up paint job: <span class="badge badge-pill {{( $project->is_touch_up == 0 ? 'badge-danger' : 'badge-success' )}}">{{( $project->is_touch_up == 0 ? 'No' : 'Yes' )}}</span> </li>
              <li>Full Paintjob:  <span class="badge badge-pill {{( $project->is_fullpaint == 0 ? 'badge-danger' : 'badge-success' )}}">{{( $project->is_fullpaint == 0 ? 'No' : 'Yes' )}}</span> </li>
              <li>Cut and Polish:  <span class="badge badge-pill {{( $project->is_cut_and_polish == 0 ? 'badge-danger' : 'badge-success' )}}">{{( $project->is_cut_and_polish == 0 ? 'No' : 'Yes' )}}</span> </li>
              <li>Maintenance Service:  <span class="badge badge-pill {{( $project->is_maintenance == 0 ? 'badge-danger' : 'badge-success' )}}">{{( $project->is_maintenance == 0 ? 'No' : 'Yes' )}}</span> </li>
              <li>Minor Accident:  <span class="badge badge-pill {{( $project->is_minor_accident == 0 ? 'badge-danger' : 'badge-success' )}}">{{( $project->is_minor_accident == 0 ? 'No' : 'Yes' )}}</span> </li>
              <li>Major Accident:  <span class="badge badge-pill {{( $project->is_major_accident == 0 ? 'badge-danger' : 'badge-success' )}}">{{( $project->is_major_accident == 0 ? 'No' : 'Yes' )}}</span> </li>
            </ul>
          </div>
        </div>
  
        <div class="col-md-4">
          <div class="col-md-4">
            <img style="width: 450px; margin-top: 15px; border: solid 1px #ced4da;" src="/appointment/image/{{$project->id}}" alt="">
          </div>
        </div>
      </div>

     

      @if (!$read_only)
      <hr>
      <div class="row">
        <div class="col-md-8"></div>
          @if ($project->status == 'in_progress')
          <div class="col-md-2" >
              <label for="type">Change Complete Percentage</label>
              <select class="form-control" id="percentage" name="percentage">
                <option  {{($project->progress == '0' ? 'selected' : '')}} value="0">0%</option>
                <option  {{($project->progress == '25' ? 'selected' : '')}} value="25">25%</option>
                <option  {{($project->progress == '50' ? 'selected' : '')}} value="50">50%</option>
                <option  {{($project->progress == '75' ? 'selected' : '')}} value="75">75%</option>
                <option  {{($project->progress == '100' ? 'selected' : '')}} value="100">100%</option>
              </select>
          </div>  
          @endif
          
          <div class="col-md-2" >
            <label for="type">Change Status</label>
            <select class="form-control" id="status" name="status">
              <option  {{($project->status == 'approved' ? 'selected' : '')}} value="approved">Pending</option>
              <option  {{($project->status == 'in_progress' ? 'selected' : '')}} value="in_progress">In Progress</option>
              <option  {{($project->status == 'completed' ? 'selected' : '')}} value="completed">Completed</option>
            </select>
        </div>
      </div> 
      @endif
      
    </div><!-- /.card-body -->
  </div>

  <div class="card card-primary card-outline">
    <div class="card-header">
      <h2 class="card-title" style="font-size: xx-large;">Appointment Activities</h2>
    </div> 

    <div class="card-body"> <!-- /.card-body -->
      <div class="row">
        <div class="col-md-12">
          <div class="timeline">
            @foreach ($project_activities as $key => $project_activity)
                <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red">{{$key}}</span>
              </div>
                <!-- /.timeline-label -->
              @foreach ($project_activities[$key] as $project_activity_inner)
                  <!-- timeline item -->
                <div>
                  <i class="fa fa-camera bg-purple"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i>{{\Carbon\Carbon::parse($project_activity_inner->created_at)->format('h:i a')}}</span>
                    <h3 class="timeline-header"><a href="#">{{$project_activity_inner->user_name}}</a> uploaded new photos with some comments</h3>
                    <div class="timeline-body">
                      <div>
                        {!!$project_activity_inner->description!!}
                      </div>

                      <div class="row">
                        @foreach ($project_activity_inner->files as $image)
                          <div class="col-md-3">
                            <div class="col-md-3">
                              <img style="width: 350px; margin-top: 15px; border: solid 1px #ced4da;" src="/appointment/details/get-image/{{$image->id}}" alt="...">
                            </div>
                          </div>
                        @endforeach
                      </div>
                    
                    </div>
                  </div>
                </div>
                <!-- END timeline item -->
              @endforeach
            @endforeach

            
          
            
          </div>
        </div>
      </div>
     
    </div><!-- /.card-body -->
  </div>

 
  
</div>


<script type="text/javascript">

    $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
    });

  function updateAppointment(value, type){
    $.ajax({
          type: "POST",
          data: {value:value, type: type, id:"{{$project->id}}"},
          url: "/appointment/update-stats",
          success: function(data){


            swal.fire({
              title: 'Update!',
              text: 'Appointment has been updated.',
              icon: 'success'
              }).then((result) => {
                location.reload();
              });
          }
      });
  }

  $(document).ready(function () {
     
    $(document).on('change', '#percentage', function(e) {
      var value = $('#percentage').val();
      updateAppointment(value, 'percentage');
    });

    $(document).on('change', '#status', function(e) {
      var value = $('#status').val();
      updateAppointment(value, 'status');
    });

  });
  
</script>

@endsection