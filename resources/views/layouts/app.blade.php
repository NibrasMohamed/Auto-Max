<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
          <!-- Font Awesome Icons -->
          <link rel="stylesheet" href="/admin-lte/plugins/fontawesome-free/css/all.min.css">
          <!-- Theme style -->
          <link rel="stylesheet" href="/admin-lte/dist/css/adminlte.min.css">
          <link rel="stylesheet" href="/css/app-manual.css">
    <title>{{config('app.name')}}</title>
</head>
<body>
    @include('includes.navbar')
    @yield('content')
    @yield('third_party_stylesheets')
    @stack('page_css')
</body>
{{-- <script src="admin-lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin-lte/dist/js/adminlte.min.js"></script> --}}
</html>