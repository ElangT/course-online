@extends('layouts.master')
@section('additional-css')
  <link href="{{ asset('/css/course_detail.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="space row course ">

<!-- 	<div class="alert alert-success" id="cartadded" role="alert"><strong>{{ $course->ak_course_name }}</strong> Masuk ke cart</div>
 -->
	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
		<img src="{{asset('images/'.$provider->ak_provider_img_path) }}" class="img-thumbnail img-responsive">
	
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
	<div class="space row course panel panel-default">
		<div class="col-lg-1 col-md-1 col-sm-0 col-xs-0"></div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<h2>Detail Kursus</h2>
			<p class="margin-down-sml">{{ $course->ak_course_detail_desc }}</p>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<p>Alamat		: 	{{ $provider->ak_provider_address }}</p>
			<p>Daerah		:	{{$provider->ak_region_namefull}},	{{$provider->ak_region_cityname}}</p>
			<p>Sisa Kursi	:	{{$course->ak_course_detail_size - $course->ak_course_detail_seat}}</p>
		</div>
	</div>
	<div class="space row course panel panel-default">
		<div class="col-lg-1 col-md-1 col-sm-0 col-xs-0"></div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<h2>Detail Provider</h2>
			<p class="margin-down-sml">{{ $provider->ak_provider_description }}</p>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<p class="margin-down-sml">{{ $provider->ak_provider_description }}</p>
			<p>Kode Post	:	{{ $provider->ak_provider_zipcode }}</p>
			<p>Nama			:	{{ $provider->ak_provider_firstname }} {{$provider->ak_provider_lastname}}</p>
			<p>Email 		: 	{{ $provider->ak_provider_email }}</p>
			<p>No Telp  	: 	{{ $provider->ak_provider_telephone }}</p>
		</div>
	</div>
</div>
</div>
@endsection
@section('additional-js')
<script type="application/javascript">
</script>

@endsection