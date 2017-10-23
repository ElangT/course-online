@extends('layouts.master')
@section('content')
@include('search-form')
    @if (isset($courses))
    <?php $result = 0; ?>
    <div class="space">
        @foreach ($courses as $course)
        <div class="panel panel-danger sharp-box space-item course">
            <div class="panel-body row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <img src="{{ asset('images/'.$course->ak_provider_img_path) }}">
                </div>
                <div class="parent col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <h1 class=""><a href="{{ URL::to('/courses/' . $course->ak_course_id) }}">{{ $course->ak_course_name }}</a></h1>
                    <h2 class="margin-left-sml child set-up set-right red">Rp {{ $course->ak_course_detail_price }}</h2>
                    <h2 class="float-normal">{{ $course->ak_subcat_name }}   <span class="label label-success">{{ $course->ak_course_level_name }}</span>  <span class="label label-primary">{{ $course->ak_course_age_name_id }}</span></h2>
                    <p class="margin-down-sml">{{ $course->ak_course_detail_desc }}</p>
                    <p class="margin-down-sml">Sisa bangku: {{ $course->ak_course_detail_seat }}</p>
                    <p class="margin-down-sml">
                        @if($course->ak_course_open)
                        Kelas dibuka
                        @else
                        Kelas ditutup
                        @endif
                    </p>
                    <a href="{{ URL::to('/courses/' . $course->ak_course_id) }}">DETAIL</a>
                </div>
            </div>
        </div>
        <?php $result = $result + 1; ?>
        @endforeach
        {{ $courses->links() }}
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
    echo "<p class='result-text'>No result matched!</p>";
    }
    ?>
@endif
@endsection