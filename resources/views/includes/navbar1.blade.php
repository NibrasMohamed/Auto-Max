<style>
  .abs-center-x {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
}
</style>

<nav class="navbar navbar-toggleable-sm navbar-fixed-top navbar-inverse bg-inverse main-nav">
    <div class="container">
        <ul class="nav navbar-nav">
            <li class="active">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li>
                <a class="nav-link" href="#">Left</a>
            </li>
            <li>
                <a class="nav-link" href="#">Left</a>
            </li>
            <li>
                <a class="nav-link" href="#">Left</a>
            </li>
            <li class="nav navbar-nav abs-center-x"><a class="nav-link" href="#">Center</a></li>
            <div class="nav navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="#">Right</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Right</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Right</a>
            </li>

            </div>
    </div>
</nav>
<div class="container">
        <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">viewport center</div>
        <div class="col-md-4"></div>
    </div>
</div>