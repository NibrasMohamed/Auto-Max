@extends('layouts.admin')
@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">New Appointment</h3>
    </div>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action="/appointment/store" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <label for="type">Vehicle type</label>
                <select class="form-control" name="type" required>
                  <option>Car</option>
                  <option>Van</option>
                  <option>Cab</option>
                  <option>Truck</option>
                  <option>Bike</option>
                </select>
            </div>
            
            <div class="col-md-4">
                <label for="make">Make</label>
                <select class="form-control" name="make" required>
                    <option>Toyota</option>
                    <option>Suzuki</option>
                    <option>Mitsubichi</option>
                    <option>Nissan</option>
                    <option>Honda</option>
                  </select>
            </div>
           
            <div class="col-md-4">
                <label for="model">Model</label>
                <input type="text" class="form-control" name="model" id="model" required>
            </div>    
        </div>

        <br>
        <div class="row">
          <div class="col-md-12">
            <label >Job Type</label>
          </div>
          <div class="col-md-2">
            <label for="">Touch-up paint job: </label>
            <input type="checkbox" name="is_touch_up" value="is_touch_up">
          </div>
          <div class="col-md-2">
            <label for="">Full Paintjob: </label>
            <input type="checkbox" name="is_fullpaint"  value="is_fullpaint">
          </div>
          <div class="col-md-2">
            <label for="">Cut and Polish: </label>
            <input type="checkbox" name="is_cut_and_polish"  value="is_cut_and_polish">
          </div>
          <div class="col-md-2">
            <label for="">Maintenance Service: </label>
            <input type="checkbox" name="is_maintenance"  value="is_maintenance">
          </div>
          <div class="col-md-2">
            <label for="">Minor Accident: </label>
            <input type="checkbox" name="is_minor_accident"  value="is_minor_accident">
          </div>
          <div class="col-md-2">
            <label for="">Major Accident: </label>
            <input type="checkbox" name="is_major_accident"  value="is_major_accident">
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <label for="details">Description</label>
            <textarea name="details" class="form-control" id="" cols="30" rows="10"></textarea>
          </div>
        </div>

        <br>
        <div class="row">
          <div class="col-md-12">
              <label for="image_file">Images</label>
              <input required id="image_file" class="uploader" type="file" name="image_file" accept="image/*" multiple />
            </div>
        </div>

        <br>
        <div class="card-footer text-right">
          <button type="button" class="btn btn-default" id="cancel">Cancel</button>
          <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </div>
    </form>
</div>

<script type="text/javascript">
  $(document).ready(function () {
      $('#submit').click(function() {
        checked = $("input[type=checkbox]:checked").length;
  
        if(!checked) {
          alert("You must Select job type.");
          return false;
        }
  
      });


      $("#image_file").fileinput({
          theme: 'fas',
          allowedFileExtensions: ['jpg','jpeg', 'png', 'gif','webp'],
          overwriteInitial: false,
          maxFileCount: 1,
          showUpload: false,
          dropZoneEnabled: false,
          showUploadedThumbs : false,
          actionUpload: '<button style="display: none;" type="button" class="asd kv-file-upload {uploadClass}" title="{uploadTitle}">{uploadIcon}</button>',
      });
  });
  
</script>

@endsection