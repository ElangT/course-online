@extends('layouts.master')

@section('content')
<h1>Manage Class/Course</h1>
<div class="panel"> 
<img src="{{ $image }}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
<a href="{{route('course.create')}}">Create Course</a>
<button>Change Profil</button>
</div>
@if (isset($courses))
<?php $result = 0; ?>
<div class="space">
@foreach ($courses as $course)
    <div class="panel panel-danger sharp-box space-item course">
        <div class="panel-body row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <img src="{{ $image }}">
            </div>
            <div class="parent col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <h1 class=""><a href="{{ URL::to('/courses/' . $course->ak_course_id) }}">{{ $course->ak_course_name }}</a></h1>
                <h2 class="margin-left-sml child set-up set-right red">Rp {{ $course->ak_course_detail_price }}</h2>
                <h2 class="float-normal">{{ $course->ak_subcat_name }}   <span class="label label-success">{{ $course->ak_course_level_name }}</span>  <span class="label label-primary">{{ $course->ak_course_age_name_id }}</span></h2>
                <p class="margin-down-sml">{{ $course->ak_course_detail_desc }}</p>
                @foreach($course->schedule as $schedule)
                <p class="margin-down-sml">{{ $schedule->ak_course_schedule_day }}, {{ $schedule->ak_course_schedule_time }}</p>
       			@endforeach
                    <a href="{{ Route('course.update', $course->ak_course_id)}}">Edit</a>

                    <a href="{{ URL::to('/provider/closecourse/' . $course->ak_course_id) }}"
                        onclick="event.preventDefault();
                                 document.getElementById('close-{{$course->ak_course_id}}').submit();">
                        Close
                    </a>

                    <form id="close-{{$course->ak_course_id}}" action="{{ URL::to('/provider/closecourse/' . $course->ak_course_id) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
            </div>
        </div>
    </div>
    <?php $result = $result + 1; ?>
@endforeach
</div>
    <?php if ($result > 0) {
        echo "<p class='result-text'>Returned ".$result." courses.</p>";
    } ?>
@else
    <?php
        if (!isset($result)) {
            echo "<p class='result-text'>Search anything!</p>";
        }
        else {
            echo "<p class='result-text'>You don't have a courses</p>";
        }
    ?>
@endif

@endsection
