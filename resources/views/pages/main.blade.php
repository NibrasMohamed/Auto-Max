@extends('layouts.app')
@section('content')
<section class="py-5 text-center container">
<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($projects as $project)
        <div class="col">
            <div class="card shadow-sm">
                <div id="carouselExampleControlss" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100"  src="{{$project['img1']}}"  width="100%" height="225" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100"  src="{{$project['img2']}}"  width="100%" height="225" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100"  src="{{$project['img3']}}"  width="100%" height="225" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControlss" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControlss" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                {{-- <img class="bd-placeholder-img card-img-top" src="{{$project['img1']}}"  width="100%" height="225"> --}}
                <div class="card-body">
                  <p class="card-text">{{$project['make']}} : {{$project['model']}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    </div>
                    <small class="text-muted">Published at: {{$project['created_at']}}</small>
                  </div>
                </div>
              </div>
        </div>  
        @endforeach
    </div>

</div>
{{ $projects->links() }}
</section>

@endsection




