<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} | Registration Page</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

          <link rel="stylesheet" href="/css/app-manual.css">
    <style>
        .card,.card .card-body{
            background: rgba(31, 31, 31, 0.2);
            border-radius: 0px;
            border-color: rgba(155, 16, 16);
            border-width: 2px;
        }
        p1{
            color:black;
        }
        p2{
            color: rgb(182, 33, 33)
        }
        
        
        </style>


</head>
<body class="hold-transition register-page" style="background-image:linear-gradient(rgb(17, 14, 14), rgb(17, 14, 14, 0.2), rgba(17, 14, 14, 0.4)), url(assets/register.jpg); background-repeat: no-repeat; background-size: cover; ">
<div class="register-box">
    

    <div class="card">
        <div class="card-body register-card-body">
            <div class="register-logo">
                <a href="{{ url('/home') }}" style="color: rgb(189, 21, 21)"><p1> <b>AUTO</b> </p1> <p2>MAX</p2></a>
            </div>
            <p class="login-box-msg">Register a new membership</p>

            <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           placeholder="Full name">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-user"></span></div>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" 
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input
                            type="password"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="phone_no" class="form-control" placeholder="Phone Number">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-phone"></span></div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="InputFile" name="profile_pic">
                        <label class="custom-file-label" for="InputFile">Profile Picture</label>
                      </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input checked type="checkbox" id="terms" name="terms">
                            <label for="terms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->

    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<script src="{{ mix('js/app.js') }}" defer></script>

</body>
</html>
