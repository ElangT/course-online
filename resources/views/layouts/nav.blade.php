
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <!-- CONTAINER -->
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar">Transaksi</span>
            <span class="icon-bar">Dashboard</span>
          </button>
			    <a class="navbar-brand" href="{{url('/')}}">Kursusin</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">

            @if (Auth::guest() && !Auth::guard('provider')->check() && strpos(Route::currentRouteName(), 'provider') !== false)
            @elseif(Auth::guest() && !Auth::guard('provider')->check())
            @elseif(Auth::guard('provider')->check())
            <li><a href="{{url('/provider/dashboard')}}">Dashboard</a></li>
            @else
            <li><a href="{{url('/checkout')}}">Transaksi</a></li>
            @endif
          </ul>

          <ul class="nav navbar-nav navbar-right">
      			<li>
			        <div class='panel-custom'>
  		          @if (Auth::guest())
                  <li><a class="sign-in" href="{{ route('login') }}">Masuk</a></li>
                  <li>
                    <form action="{{ route('register') }}">
                        <button class="btn btn-kursusin sign-up" id="search-button" type="submit" >Daftar</button>
                    </form>
                @else
                  <li><a  href="{{ route('logout') }}"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                  </li>
                @endif
              </div>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div><!-- END OF CONTAINER -->
    </nav>