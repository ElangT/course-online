@extends('layouts.master')

@section('content')
<div class="space row course">

	<div class="alert alert-success" id="cartadded" role="alert"><strong>{{ $course->ak_course_name }}</strong> Masuk ke cart</div>

	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		<img src="{{asset('images/'.$result->ak_provider_img_path) }}">
	</div>
	<div class="parent col-lg-8 col-md-8 col-sm-8 col-xs-8">
		<h1 class=""><a href="{{ URL::to('/courses/' . $course->ak_course_id) }}">{{ $result->ak_course_name }}</a></h1>
		<h2 class="margin-left-sml child set-up set-right red" id="price">Rp {{ $detail->ak_course_detail_price }}</h2>
		<h2 class="float-normal">{{ $course->ak_subcat_name }}   <span class="label label-success">{{ $course->ak_course_level_name }}</span>  <span class="label label-primary">{{ $course->ak_course_age_name_eng }}</span></h2>
		<p class="margin-down-sml">{{ $detail->ak_course_detail_desc }}</p>
		@if($trolled)
		<p class="">Jadwal : </p>
		<table class="width-big">
			<tbody>
				@foreach($schedules as $schedule)
				<tr>
					<td>{{$schedule->ak_course_schedule_day}}</td>
					<td>{{$schedule->ak_course_schedule_time}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

			<p>Lokasi	:</p>
			<p>Kota	 	:	{{$result->ak_region_cityname}}</p>
			<p>Daerah 	:	{{$result->ak_region_name}}</p>
		<p>Course sudah di Trolli</p>

		@elseif(Auth::check() && $bought)
		<p class="">Jadwal : </p>
		<table class="width-big">
			<tbody>
				@foreach($schedules as $schedule)
				<tr>
					<td>{{$schedule->ak_course_schedule_day}}</td>
					<td>{{$schedule->ak_course_schedule_time}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

			<p>Lokasi	:</p>
			<p>Kota	 	:	{{$result->ak_region_cityname}}</p>
			<p>Daerah 	:	{{$result->ak_region_name}}</p>
		<p>Course sudah dibeli</p>
		@elseif(Auth::check() && $course->ak_course_open === 1)
		<form class="addToCartForm">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<p class="">Jadwal : </p>
		<select name="schedule">
			@foreach($schedules as $schedule)
				<option value="{{$schedule->ak_course_schedule_id}}">{{$schedule->ak_course_schedule_day}} {{$schedule->ak_course_schedule_time}}</option>
			@endforeach
		</select>
			<input type='hidden' name='courseid' value="{{ $detail->ak_course_detail_id }}">
			<button href='' class="addToCart margin-down-big child set-bottom set-right btn btn-danger width-sml sharp-box" data="{{$course->ak_course_id}}">Troli</button>
		</form>

		<p>Lokasi	:</p>
		<p>Kota	 	:	{{$result->ak_region_cityname}}</p>
		<p>Daerah 	:	{{$result->ak_region_name}}</p>

		@elseif($course->ak_course_open === 0)
		<p class="">Jadwal : </p>
		<table class="width-big">
			<tbody>
				@foreach($schedules as $schedule)
				<tr>
					<td>{{$schedule->ak_course_schedule_day}}</td>
					<td>{{$schedule->ak_course_schedule_time}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		<p>Lokasi	:</p>
		<p>Kota	 	:	{{$result->ak_region_cityname}}</p>
		<p>Daerah 	:	{{$result->ak_region_name}}</p>


		<div class="alert alert-warning" role="alert">
		  <strong>Kelas Ditutup<strong>
		</div>
		@else
		<p class="">Jadwal : </p>
		<table class="width-big">
			<tbody>
				@foreach($schedules as $schedule)
				<tr>
					<td>{{$schedule->ak_course_schedule_day}}</td>
					<td>{{$schedule->ak_course_schedule_time}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<p>Lokasi	:</p>
		<p>Kota	 	:	{{$result->ak_region_cityname}}</p>
		<p>Daerah 	:	{{$result->ak_region_name}}</p>

			<div class="alert alert-warning" role="alert">
			  <strong><a href="{{ route('login') }}">Login</a><strong> untuk mendaftar ke course
			</div>

		@endif
	</div>
</div>

<script type="text/javascript">
	var url = {!! '"'.url('/').'"' !!};
	var course_id = {{$result->ak_course_id}};
    $.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

</script>

@endsection
