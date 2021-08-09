

@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="assets/css/on_going.css">

<section class="wrap">
    @if (count($projects)>0)
    
    @foreach ($projects as $project)
    {{$project['status']==null? $status="active": $status=''}}
    <div class="row"> 
    <div class="col">
        <div class="container">
            <div class="card" style="background-color: rgb(252, 246, 246, 0.5)">
                <div class="box">
                    <div class="col">
                        <div class="content">
                            <h2>{{$loop->index}}</h2>
                            <h3>{{$project['make']}}&nbsp;{{$project['model']}}</h3>
                            <img src="/appointment/image/{{$project->id}}" width="150px" height="150px" alt="" style="border-radius: 20px">
                            <a  class="btn btn-outline-danger" style="background-color: #2a2b2f;" href="/appointment/details/get/{{{$project->id}}}?_t=1">View</a>
                            </div>
                    </div>
                    <div class="col">
                        <i class="fas fa-arrow-right" style="color: white"></i>
                    </div>
                    <div class="col">
                        <h6 style="color: white">Current Status</h6>
                        @if ($project->status == 'aproved')
                            <span class="badge badge-pill badge-danger">Pending</span>
                        @else
                            <span class="badge badge-pill badge-warning">In Progress</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endforeach
@else
    <p>No Ongoing Projects</p>
@endif
</section>
    
@endsection