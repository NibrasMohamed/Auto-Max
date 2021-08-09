<style>
.navbar{
    position: fixed;
    width: 100%; 
    z-index: 100;
    }
.btn-pill{
  background-color: #ddd;
  border: yellowgreen;
  color: black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 70px;
}.btn-pill:hover{
  background-color: #ddd;
  border: yellowgreen;
  color: black;
}
</style>



<nav class="navbar navbar-dark navbar-expand-md bg-dark justify-content-between">
  <div class="container-fluid">
      <div class="navbar-collapse collapse dual-nav w-50 order-1 order-md-0">
          <nav class="nav-menu d-block d-lg-block">
            <ul>
              <li class="active"><a href="/home">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#services">Services</a></li>
              <li class="drop-down"><a href="">Drop Down</a>
                <ul>
                  <li><a href="#">Drop Down 1</a></li>
                  <li class="drop-down"><a href="#">Deep Drop Down</a>
                    <ul>
                      <li><a href="#">Deep Drop Down 1</a></li>
                      <li><a href="#">Deep Drop Down 2</a></li>
                      <li><a href="#">Deep Drop Down 3</a></li>
                      <li><a href="#">Deep Drop Down 4</a></li>
                      <li><a href="#">Deep Drop Down 5</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Drop Down 2</a></li>
                  <li><a href="#">Drop Down 3</a></li>
                  <li><a href="#">Drop Down 4</a></li>
                </ul>
              </li>
              <li><a href="#contact">Contact</a></li>
              <div class="row d-xl-none d-lg-none d-block">
                <div class="col">
                  @guest
                  <li>
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                    @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  @endguest
                </div>
              </div>
              
    
            </ul>
          </nav><!-- .nav-menu -->
      </div>
      <a href="/" class="navbar-brand mx-auto d-block text-center order-0 order-md-1 w-25"><img src="/assets/automax.png" width="150" alt=""></a>
      <div class="navbar-collapse d-none-xs collapse dual-nav w-50 order-2">
          <ul class="navbar-nav d-none d-lg-block d-xl-block ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-menu">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @else
            <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @endguest
        </ul>
      </div>
  </div>
</nav>