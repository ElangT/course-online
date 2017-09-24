    <nav class="navbar navbar-inverse navbar-fixed-top">
      <!-- CONTAINER -->
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar">Dashboard</span>
          </button>
          <a class="navbar-brand" href="{{url('/')}}">Kursusin</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              @if (Auth::guard('provider')->check())
                <li><a href="{{route('provider.dashboard')}}">Dashboard</a></li>
              @endif
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li>
              <div class='panel-custom'>
                @if (Auth::guest() && !Auth::guard('provider')->check())
                  <li><a class="sign-in" href="{{ route('provider.login') }}">Masuk</a></li>
                  <li>
                    <form action="{{ route('provider.register') }}">
                        <button class="btn btn-kursusin sign-up" id="search-button" type="submit" >Daftar</button>
                    </form>
                @else
                  <li><a  href="{{ route('provider.logout') }}"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                      <form id="logout-form" action="{{ route('provider.logout') }}" method="POST" style="display: none;">
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

