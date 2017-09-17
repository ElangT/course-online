@extends('layouts.master')
@section('additional-css')
  <link href="{{ asset('/css/index.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<!-- <form method="POST" action="{{url('search')}}">
    {{ csrf_field() }}
    <div class="form-inline row space">
        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
            <input type="text" class="sharp-box space-item height-big" id="key" name="key" value="<?php if (isset($target)): echo $target; endif; ?>" placeholder="Cari">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
            <input data-minchars=0 class="awesomplete awesomplete-space-item sharp-box height-big" list="regionlist" type="text" name="location" id="location" value="<?php if (isset($location)): echo $location; endif; ?>" placeholder="Daerah"/>
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
        <div class="col-lg-3 col-md-4 col-sm-3 col-xs-12">
            <button class="btn btn-danger sharp-box space-item height-big" type="submit">Cari</button>
        </div>
    </div>
</form> -->
<header>
  <button class="btn sign-up ">Cari Kursusin Sekarang</button>
</header>
<div class="container">
    <section id="description">
      <h3>KURSUSIN</h3>
      <p>A eros ultrices vestibulum etiam consectetur pretium penatibus id metus posuere suspendisse sed ante dictumst suspendisse aliquam eget nibh. Tristique parturient odio id scelerisque per neque facilisi feugiat integer cubilia ante a dui congue sem scelerisque ad integer parturient ante. Consequat varius a montes nullam a sociis in cubilia vestibulum vivamus consectetur vestibulum ac tempor malesuada a commodo facilisis cum parturient quam ornare hendrerit fames eget aenean tristique. A in a montes ac penatibus eget enim scelerisque accumsan mus volutpat lacinia sociosqu purus ridiculus at at ultricies phasellus est pharetra eros cras habitasse.</p>
    </section>
    <section id="work">
      <h3>CARA KERJA KURSUSIN</h3>
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <i class="fa fa-search" aria-hidden="true"></i>
          <h4>CARI</h4>
          <p>Eu vestibulum ligula inceptos tellus vestibulum litora mus a nisi rutrum sem ad porta a parturient scelerisque dapibus.</p>
        </div>
        <div class="col-sm-12 col-md-4">
          <i class="fa fa-users" aria-hidden="true"></i>
          <h4>DAFTAR</h4>
          <p>Eu vestibulum ligula inceptos tellus vestibulum litora mus a nisi rutrum sem ad porta a parturient scelerisque dapibus.</p>
        </div>
        <div class="col-sm-12 col-md-4">
          <i class="fa fa-money" aria-hidden="true"></i>
          <h4>BAYAR</h4>
          <p>Eu vestibulum ligula inceptos tellus vestibulum litora mus a nisi rutrum sem ad porta a parturient scelerisque dapibus.</p>
        </div>
      </div>
    </section>
    <section id="testimoni">
      <div class="row">
        <div class="col-sm-12 col-md-4">

        </div>
        <div class="col-sm-12 col-md-4">

        </div>
        <div class="col-sm-12 col-md-4">

        </div>
      </div>
    </section>
</div>
@endsection
