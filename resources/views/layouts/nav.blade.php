    <style type="text/css">
      .sign-up{
        color:#fff;
        background-color: #0057ff; 
        color: #fff;
        border-radius: 50px; 
        padding: 5px 15px; 
        margin-top: 10px;
      }
    </style>

<?php
  $loginroute = 'login';
  $regisroute = 'register';
  $logoutroute = 'logout';
  if(Auth::guest() && !Auth::guard('provider')->check() && strpos(Route::currentRouteName(), 'provider') !== false){
    $loginroute = 'provider.login';
    $regisroute = 'provider.register';
  }
  if(Auth::guard('provider')->check()){
    $logoutroute = 'provider.logout';
  }

?>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			    <a class="navbar-brand" href="{{url('/')}}">Kursusin</a>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
      			<li><a href="{{url('/checkout')}}">Snap</a></li>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
      			<li>
			        <div class='panel-custom'>
		          @if (Auth::guest())
                <li><a class="Sign-in" href="{{ route($loginroute) }}">Masuk</a></li>
                <li><a class="Sign-up" href="{{ route($regisroute) }}" style="border-radius: 50px; 
        padding: 5px 15px; 
        margin-top: 10px;">Daftar</a></li>
              @else
                <li><a  href="{{ route($logoutroute) }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                    </a>

                    <form id="logout-form" action="{{ route($logoutroute) }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                </li>
              @endif
              </div>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      
      </div>
    </nav>
    
    <div class='below-navbar-custom'>
    </div>
