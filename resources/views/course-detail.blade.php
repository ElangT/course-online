@extends('layouts.master')
@section('additional-css')
  <link href="{{ asset('/css/course_detail.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="space row course ">

<!-- 	<div class="alert alert-success" id="cartadded" role="alert"><strong>{{ $course->ak_course_name }}</strong> Masuk ke cart</div>
 -->
	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
		<img src="{{asset('images/'.$provider->ak_provider_img_path) }}" class="img-responsive">
	
	</div>
	<div class="parent col-lg-7 col-md-7 col-sm-12 col-xs-12">
		<h1 class="">{{ $course->ak_course_name }}</h1>
		<h2 id="price"><span class="label label-success">{{ $course->ak_course_level_name }}</span>  <span class="label label-primary">{{ $course->ak_course_age_name_id }}</span> <span  class="margin-left-sml child set-right blue">Rp {{ $course->ak_course_detail_price }}</h2>
		<!--<h2 class="float-normal">Katagori: {{ $course->ak_maincat_name }}</h2>
		<h2 class="float-normal">Sub Katagori: {{ $course->ak_subcat_name }}</h2> -->
		<p><strong>Jadwal Kursus:</strong></p>
		@if($trolled)
			@foreach($schedules as $schedule)
			  <p>{{$schedule->ak_course_schedule_day}}, {{$schedule->ak_course_schedule_time}}</p>
			@endforeach
			<form action="{{route('checkout')}}" method="GET">
				<button type="submit" class="addToCart margin-down-big child set-bottom set-right btn btn-danger width-sml sharp-box" data="{{$course->ak_course_id}}">Checkout</button>
			</form>
		@elseif(Auth::check() && $course->ak_course_open === 1 && $course->ak_course_active === 1)
		<form method="POST" action="{{url('courses/'.$course->ak_course_id)}}">
	    {{ csrf_field() }}
			@foreach($schedules as $schedule)
			<div class="radio">
			  <label><input value="{{$schedule->ak_course_schedule_id}}" type="radio" name="schedule" checked>{{$schedule->ak_course_schedule_day}}, {{$schedule->ak_course_schedule_time}}</label>
			</div>
			@endforeach
			<input type='hidden' name='courseid' value="{{ $course->ak_course_detail_id }}">
			<button type="submit" class="addToCart margin-down-big child set-bottom set-right btn btn-danger width-sml sharp-box" data="{{$course->ak_course_id}}">Troli</button>
		</form>
		@else
			@foreach($schedules as $schedule)
			  <p>{{$schedule->ak_course_schedule_day}}, {{$schedule->ak_course_schedule_time}}</p>
			@endforeach
			<div class="margin-left-sml set-down child set-right alert alert-secondary" id="price">{{$message}}</div>
		@endif
	</div>
	</div>
	<div class="space row course">
		<div id="sidebar" class="col-lg-3 col-md-3 col-sm-0 col-xs-0">
		<!-- START -->
		    <div class="clearfix">        
		        <div id="scrolling-sidebar">
		            <div id="nav-anchor"></div>
		            <nav id="scrolling-navbar">
		                <ul>
		                	<li><p>Kursus</p></li>
							<li><a href="#deskripsi-kursus">Deskripsi</a></li>
							<li><a href="#lokasi-kursus">Lokasi</a></li>
							<li><a href="#detail-kursus">Detail</a></li>
							<hr/>
							<li><p>Provider</p></li>
							<li><a href="#deskripsi-provider">Deskripsi</a></li>
							<li><a href="#kontak-provider">Provider</a></li>
		                </ul>
		            </nav>
		        </div>
		    </div>

		<!-- END -->
		</div>
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 gray">
			<a class="anchor"  id="deskripsi-kursus"></a>
			<h2><strong>Deskripsi</strong></h2>
			<p class="margin-down-sml">{{ $course->ak_course_detail_desc }}</p>
			<a class="anchor"  id="lokasi-kursus"></a>
			<h2><strong>Lokasi</strong></h2>
			<p>Alamat		: 	{{$provider->ak_provider_address }}</p>
			<p>Daerah		:	{{$provider->ak_region_namefull}},	{{$provider->ak_region_cityname}}</p>
			<p>Kode Post	:	{{ $provider->ak_provider_zipcode }}</p>
			<a class="anchor"  id="detail-kursus"></a>
			<h2><strong>Detail</strong></h2>
			<p>Sisa Kursi	:	{{$course->ak_course_detail_size - $course->ak_course_detail_seat}}</p>
			<p>Fasilitas	:</p>
			@foreach($facilities as $facility)
				<p>			{{$facility->ak_facility_type_name_idn}}</p>
			@endforeach
		<a class="anchor"  id="deskripsi-provider"></a>
		<div class="gray-box row">
			<div>
				<p><strong>Deskripsi Provider</strong></p>

					<p class="margin-down-sml">{{ $provider->ak_provider_description }}</p>
				<hr/>
				<a class="anchor"  id="kontak-provider"></a>
				<p><strong>Kontak Provider</strong></p>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<p>Nama</p>
					<p>Email</p>
					<p>No Telp</p>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
					<p>{{ $provider->ak_provider_firstname }} {{$provider->ak_provider_lastname}}</p>
					<p>{{ $provider->ak_provider_email }}</p>
					<p>{{ $provider->ak_provider_telephone }}</p>
				</div>
			</div>
		</div>
	</div>
	</div>
@endsection
@section('additional-js')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>
 --><script type="application/javascript">
// Scroll
// $(document).ready(function(){

//     /** 
//      * This part does the "fixed navigation after scroll" functionality
//      * We use the jQuery function scroll() to recalculate our variables as the 
//      * page is scrolled/
//      */
//     $(window).scroll(function(){
//         var window_top = $(window).scrollTop() + 12; // the "12" should equal the margin-top value for nav.stick
//         var div_top = $('#nav-anchor').offset().top;
//             if (window_top > div_top) {
//                 $('#scrolling-navbar').addClass('stick');
//             } else {
//                 $('#scrolling-navbar').removeClass('stick');
//             }
//     });

//     /**
//      * This part causes smooth scrolling using scrollto.js
//      * We target all a tags inside the nav, and apply the scrollto.js to it.
//      */
//     $("#scrolling-navbar a").click(function(evn){
//         evn.preventDefault();
//         $('html,body').scrollTo(this.hash, this.hash); 
//     });

//     /**
//      * This part handles the highlighting functionality.
//      * We use the scroll functionality again, some array creation and 
//      * manipulation, class adding and class removing, and conditional testing
//      */
//     var aChildren = $("#scrolling-navbar li").children(); // find the a children of the list items
//     var aArray = []; // create the empty aArray
//     for (var i=0; i < aChildren.length; i++) {    
//         var aChild = aChildren[i];
//         var ahref = $(aChild).attr('href');
//         aArray.push(ahref);
//     } // this for loop fills the aArray with attribute href values

//     $(window).scroll(function(){
//         var windowPos = $(window).scrollTop(); // get the offset of the window from the top of page
//         var windowHeight = $(window).height(); // get the height of the window
//         var docHeight = $(document).height();

//         for (var i=0; i < aArray.length; i++) {
//             var theID = aArray[i];
//             var divPos = $(theID).offset().top; // get the offset of the div from the top of page
//             var divHeight = $(theID).height(); // get the height of the div in question
//             if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
//                 $("a[href='" + theID + "']").addClass("nav-active");
//             } else {
//                 $("a[href='" + theID + "']").removeClass("nav-active");
//             }
//         }

//         if(windowPos + windowHeight == docHeight) {
//             if (!$("#scrolling-navbar li:last-child a").hasClass("nav-active")) {
//                 var navActiveCurrent = $(".nav-active").attr("href");
//                 $("a[href='" + navActiveCurrent + "']").removeClass("nav-active");
//                 $("#scrolling-navbar li:last-child a").addClass("nav-active");
//             }
//         }
//     });
// });

</script>

@endsection