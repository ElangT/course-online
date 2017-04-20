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
			<li>
				<a href="{{url('/snap')}}">Snap</a>
			</li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
			<li>
			<div class='panel-custom'>
		        @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
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
<!-- Modal content-->
<div class="modal fade" id="advancedsearch" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content filter-panel" id="filter-panel">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" type="button">&times;</button>
				<h4 class="modal-title">Advanced Search</h4>
			</div>
			<div class='modal-body'>
				<form class="form{{-- -inline --}}" role="form">
					<div class="form-group">
						<label class="filter-col" for="pref-search" style="margin-right:0;">Keyword:</label> <input class="form-control input-sm" id="keyword" placeholder="Keyword" type="text">
					</div><!-- form group [search] -->
					<div class="form-group">
						<label class="filter-col" for="pref-search" style="margin-right:0;">Lokasi:</label> <input class="form-control input-sm" id="lokasi" placeholder="Lokasi" type="text">
					</div><!-- form group [search] -->
					<div class="form-group">
						<label class="filter-col" for="pref-orderby" style="margin-right:0;">Umur :</label> <select class="form-control" id="umur" name='umur'>
							<option>
								Semua Umur
							</option>
							<option>
								&gt; 18
							</option>
							<option>
								19 - 26
							</option>
							<option>
								27 - 35
							</option>
							<option>
								&gt; 36
							</option>
						</select>
					</div><!-- form group [order by] -->
					<div class="form-group">
						<label class="filter-col" for="pref-orderby" style="margin-right:0;">Harga :</label> <select class="form-control" id="harga" name='harga'>
							<option>
								Semua Harga
							</option>
							<option>
								&lt; Rp. 500.000
							</option>
							<option>
								Rp. 500.000 - 999.999
							</option>
							<option>
								Rp. 1000.000 - 2.499.999
							</option>
							<option>
								Rp. 2.500.000 - 4.999.999
							</option>
							<option>
								&gt; Rp. 5.000.000
							</option>
						</select>
					</div><button class="btn btn-default filter-col" type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
				</form>
			</div>
		</div>
	</div>
</div><!-- form group [order by] -->
<!-- Modal content-->
