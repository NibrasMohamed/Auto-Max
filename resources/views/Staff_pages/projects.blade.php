@extends('layouts.admin')
<link rel="stylesheet" href="assets/css/projects.css">

<style>
body .container .card .box .content button {
  position: relative;
  display: inline-block;
  padding: 8px 20px;
  background-color: rgb(0, 0, 0, 0.2);
  border-radius: 5px;
  text-decoration: none;
  color: white;
  margin-top: 20px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
  transition: 0.5s;
}
body .container .card .box .content button:hover {
  background-color: brown;
  color: white;
}

</style>

@section('content')
<div class="wrap" style="background-image:linear-gradient(rgb(17, 14, 14), rgb(17, 14, 14, 0.7), rgba(17, 14, 14, 0.6)), url(assets/project.jpg); background-repeat: no-repeat; background-size: cover; position: relative; " >

    @if (count($projects)>0)
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($projects as $project)
        
        <div class="col">
            <div class="container">
            <div class="card" style="background-color: rgb(252, 246, 246, 0.5)">
              <div class="box">
                <div class="content">
                  <h2>{{$loop->index}}</h2>
                  <h3>{{$project['make']}}&nbsp;{{$project['model']}}</h3>
                  <img src="/appointment/image/{{$project->id}}" width="250" height="250" alt="" style="border-radius: 20px">
                  <button>View</button>
                </div>
              </div>
            </div>

        </div>
    </div>
        @endforeach  
</div>



        
    @endif
    {{ $projects->links() }}
</div> 
@endsection