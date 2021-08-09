@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col md-8">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Staff Update</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('update') }}">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group">
                  <label for="name">User Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter email" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Password" name="password" required> 
                </div>
                <div class="form-group">
                  <label for="phone_no">Phone Number</label>
                  <input type="text" class="form-control" id="phone_no"  placeholder="Phone Number" name="phone_no" value="{{$user->phone_no}}" >
                </div>
                <div class="form-group">
                  <label for="profile_pic">Profile Picture</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="profile_pic">
                      <label class="custom-file-label" for="profile_pic">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Update</span>
                    </div>
                  </div>
                </div>
            </div>
              <!-- /.card-body -->
        
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" >Submit</button>
              </div>
            </form>
          </div>
    </div>
</div>
@endsection