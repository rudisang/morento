<div>
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
        <li><a href="{{ url('/dashboard/account') }}">My Account</a></li>
        <form method="POST" action="{{ route('logout') }}"><li> 
<a href="{{route('logout')}}" onclick="event.preventDefault();
          this.closest('form').submit();">Logout</a>
          @csrf</li></form>
      </ul>


      <nav class="white">
       <div class="container">
        <div class="nav-wrapper">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons teal-text">menu</i></a>

            <!-- PROJECT LOGO-->
            <a href="/" class="brand-logo teal-text"><img style="margin-top:10px" width=150 src="{{asset('images/logo.png')}}" alt=""></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="/properties" class="teal-text">Properties</a></li>
              <li><a href="#" class="teal-text">How it Works</a></li>
              @if (Route::has('login'))
          
                  @auth
                  <li><a class="dropdown-trigger teal-text" href="#!" data-target="dropdown1">{{ Auth::user()->name }}<i class="material-icons right teal-text">arrow_drop_down</i></a></li>
                  @else
                      <strong><li><a href="{{ route('login') }}" class="teal-text" style="font-weight: bold">Log in</a></li>

                      @if (Route::has('register'))
                      <li><a href="{{ route('register') }}" class="teal-text" style="font-weight: bold">Register</a></li>
                      @endif
                  @endauth
 
          @endif
            </ul>
          </div>
       </div>
      </nav>

    <!-- SIDE NAV COMPONENT -->  
    <x-side-nav />
</div>