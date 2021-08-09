<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="assets/css/login.css">
<link rel="stylesheet" href="/admin-lte/plugins/fontawesome-free/css/all.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>



<div class="sidenav">
   <a class="fas fa-back" href=""></a>
    <div class="login-main-text">
       <h2>Application<br> Login Page</h2>
       <p>Login or register from here to access.</p>
    </div>
 </div>
 <div class="main">
    <div class="col-md-6 col-sm-12">
       <div class="login-form">
          <form method="POST" action="{{ url('/login') }}">
             <div class="form-group">
               <input type="email"
               name="email"
               value="{{ old('email') }}"
               placeholder="Email"
               class="form-control @error('email') is-invalid @enderror">
        @error('email')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
             </div>
             <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password">
             </div>
             <button type="submit" class="btn btn-black">Login</button>
             <button type="submit" class="btn btn-secondary">Register</button>
          </form>
       </div>
    </div>
 </div>