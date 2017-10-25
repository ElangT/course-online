@extends('layouts.master')
@section('additional-css')
@endsection
@section('content')
    <div class="row profile">
        <div class="col-md-3">
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
                        Marcus Doe
                    </div>
                    <div class="profile-usertitle-job">
                        Developer
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                </div>

                    <ul class="nav">
                        <li class="active">
                            <a href="{{route('provider.edit')}}">
                            <i class="glyphicon glyphicon-home"></i>
                            Change Profile </a>
                        </li>
                        <li>
                            <a href="{{route('provider.passwordedit')}}">
                            <i class="glyphicon glyphicon-user"></i>
                            Change Password </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <h1>Manage Class/Course</h1>
                <a href="{{route('course.create')}}">Create Course</a>
                <a href="#">Manage Transaction</a>

                @if (isset($courses))
                <?php $result = 0; ?>
                <div class="space">
                @foreach ($courses as $course)
                    <div class="panel panel-danger sharp-box space-item course">
                        <div class="panel-body row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <img class="img-thumbnail img-responsive" src="{{ asset('images/'.$image) }}">
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
                                <a href="{{ URL::to('/provider/manage/' . $course->ak_course_id) }}">Manage</a>

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
