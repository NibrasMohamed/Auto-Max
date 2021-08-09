@extends('layouts.admin')
@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">New Appointment Activity</h3>
    </div>
    
    <form action="/appointment/details/store" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="project_id" value="{{$project_id}}" />
      <div class="card-body">

        <div class="row">
          <div class="col-md-12">
            <label for="details">Description</label>
            <textarea required name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
          </div>
        </div>

        <br>
        <div class="row">
          <div class="col-md-12">
              <label for="image_file">Images</label>
              <input required id="image_file" class="uploader" type="file" name="image_file[]" accept="image/*" multiple />
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
        
  
      });

      $('#description').summernote({
          height: 300,
          fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150'],
          toolbar: [
              ['style', ['style']],
              ['fontsize', ['fontsize']],
              ['fontname', ['fontname']],
              ['style', ['bold', 'italic', 'underline', 'clear']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['height', ['height']],
              ['insert', ['picture', 'myvideo', 'link', 'table', 'hr']],
              ['misc', ['fullscreen', 'undo', 'redo']]
          ],
      });


      $("#image_file").fileinput({
          theme: 'fas',
          allowedFileExtensions: ['jpg','jpeg', 'png', 'gif','webp'],
          overwriteInitial: false,
          showUpload: false,
          dropZoneEnabled: false,
          showUploadedThumbs : false,
          actionUpload: '<button style="display: none;" type="button" class="asd kv-file-upload {uploadClass}" title="{uploadTitle}">{uploadIcon}</button>',
      });
  });
  
</script>

@endsection