
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <!-- CONTAINER -->
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar">Transaksi</span>
          </button>
			    <a class="navbar-brand" href="{{url('/')}}">Kursusin</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="#">Home</a></li>
      			<li><a href="{{url('/checkout')}}">Transaksi</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
      			<li>
			        <div class='panel-custom'>
  		          @if (Auth::guest())
                  <li><a class="sign-in" href="{{ route('login') }}">Masuk</a></li>
                  <li><button class="btn sign-up " href="{{ route('register') }}"> Daftar</button></li>
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
