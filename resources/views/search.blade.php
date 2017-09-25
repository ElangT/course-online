@extends('layouts.master')
@section('content')
<form method="POST" action="{{url('search')}}">
    {{ csrf_field() }}
    <div class="form-inline row space">
        <?php function getValue($var){
        if (isset($var)) {
        if (strlen($var) > 0) {
        echo str_replace("%", "", $var);
        }
        }
        }?>
        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
            <input type="text" class="sharp-box space-item height-big" id="key" name="key" value="<?php getValue($target); ?>" placeholder="Cari">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
            <input data-minchars=0 class="awesomplete awesomplete-space-item sharp-box height-big" list="regionlist" type="text" name="location" id="location" value="<?php getValue($location); ?>" placeholder="Daerah"/>
            <datalist id="regionlist">
                <option>Bekasi</option>
                <option>Bogor</option>
                <option>Depok</option>
                <option>Jakarta Selatan</option>
                <option>Jakarta Timur</option>
                <option>Jakarta Pusat</option>
                <option>Jakarta Barat</option>
                <option>Jakarta Utara</option>
                <option>Tangerang</option>
                <option>Tangerang Selatan</option>
            </datalist>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <button class="btn btn-danger sharp-box space-item height-big" type="submit">Cari</button>
        </div>
    </div>
    <div class="form-inline row space margin-up-big">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <input type="number" class="sharp-box space-item height-med" id="min" name="min" value="<?php if (isset($max)): echo $min; endif; ?>" placeholder="Harga Minimal">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <input type="number" class="sharp-box space-item height-med" id="max" name="max" value="<?php if (isset($max)): echo $max; endif; ?>" placeholder="Harga Maksimal">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <select data-minchars=0 class="awesomplete awesomplete-space-item sharp-box height-med" list="agelist" type="text" name="age" id="age" value="<?php getValue($age); ?>" placeholder="Umur">
                <option>Anak-Anak</option>
                <option>Remaja</option>
                <option>Dewasa</option>
            </select>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <select data-minchars=0 class="awesomplete awesomplete-space-item sharp-box height-med" list="levellist" type="text" name="level" id="level" value="<?php getValue($level); ?>">
                <option>Pemula</option>
                <option>Menengah</option>
                <option>Mahir</option>
            </select>
        </div>
    </div>
    </form>
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