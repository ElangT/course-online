@extends('layouts.master')

@section('content')

@if(empty($courses))

<h1>EMPTY</h1>

@endif

<table>
	<thead>
		<th><b>Course</b></th>
		<th><b>Price</b></th>
		<th><b>Detail</b></th>
	</thead>
	<tbody>
		@foreach($courses as $course)

		<tr>
			<td>{{$course->ak_course_name}}</td>
			<td>{{$course->detail->ak_course_detail_price}}</td>
			<td>{{$course->detail->ak_course_detail_desc}}</td>
		</tr>
		
		@endforeach
	</tbody>
</table>

@endsection