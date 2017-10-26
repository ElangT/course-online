@extends('layouts.master')
@section('additional-css')
    <link href="{{ asset('/css/dashboard.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3" id="sidebar">
            <div class="panel">
            <div class="profile-sidebar panel">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic picform">
                    <form action="{{ route('provider.image.upload') }}" id="imageform" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <img type="image" id="imageinput" src="{{asset('images/'.$image) }}" class="img-thumbnail img-responsive" width="304" height="236"/>
                        <input type="file" name="image" id="my_file" style="display: none;" />
                    </form>
                </div>
                <!-- END SIDEBAR USERPIC -->

                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                </div>

                    <ul class="nav">
                        <li class="active">
                            <a href="{{route('provider.edit')}}">
                            <i class="glyphicon glyphicon-user"></i>
                            Change Profile </a>
                        </li>
                        <li>
                            <a href="{{route('provider.passwordedit')}}">
                            <i class="glyphicon glyphicon-cog"></i>
                            Change Password </a>
                        </li>
                        <li id="nav-title">
                            Manage Class/Course
                        </li>
                        <li>
                            <a href="{{route('course.create')}}">
                            <i class="glyphicon glyphicon-pencil"></i>
                            Create Course</a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="glyphicon glyphicon-barcode"></i>
                            Manage Transaction</a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            @if (isset($courses))
                <?php $result = 0; ?>
                <div class="space">
                @foreach ($courses as $course)
                    <div class="panel panel-default sharp-box space-item course">
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-9 col-xs-6">
                            <h1 class="course-title"><a href="{{ URL::to('/courses/' . $course->ak_course_id) }}">{{ $course->ak_course_name }}</a></h1>
                          </div>
                          <div class="col-md-3 col-xs-6 panel-setting">
                            <a href="{{ Route('course.update', $course->ak_course_id)}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
                            <a href="{{ URL::to('/provider/manage/' . $course->ak_course_id) }}"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Manage</a>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 panel-description">
                            <p>
                              <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                              <strong>Jadwal :</strong>
                            </p>
                            @foreach($course->schedule as $schedule)
                            <p>{{ $schedule->ak_course_schedule_day }}, {{ $schedule->ak_course_schedule_time }}</p>
                            @endforeach
                            <p>{{ $course->ak_course_detail_desc }}</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-9">
                            <h2 class="float-normal">
                              <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                              <span class="label label-info">{{ $course->ak_subcat_name }}</span>
                              <span class="label label-success">{{ $course->ak_course_level_name }}</span>
                              <span class="label label-primary">{{ $course->ak_course_age_name_id }}</span>
                            </h2>
                          </div>
                          <div class="col-md-3">
                            <h2 class="price">Rp {{ $course->ak_course_detail_price }}</h2>
                          </div>
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

            </div>
        </div>
    </div>
@endsection
@section('additional-js')
<script type="application/javascript">
$("#imageinput").click(function(event) {
    event.preventDefault();
    $("input[id='my_file']").click();
});
$("input[id='my_file']").on("change", function() {
    $("#imageform").submit();
});
</script>
@endsection
