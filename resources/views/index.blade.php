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
  <form action="{{url('/search')}}">
    <button class="btn btn-kursusin" id="search-button" type="submit" value="Go to Google">Cari Kursusin Sekarang</button>
</form>
</header>
<section id="description">
  <div class="container">
    <h3>Kursusin</h3>
    <p>Kursusin adalah pasar online (marketplace) di mana calon murid dapat mencari tempat kursus sesuai kebutuhannya dan bisa langsung terdaftar sebagia murid di program yang ditawarkan.
      <br>
    Kursusin memberikan kemudahan dan kecepatan dalam proses pendaftaran murid kursus melalui sistem seperti belanja online.</p>
  </div>
</section>
<section id="work">
  <h3>Cara Kerja Kursusin</h3>
  <div class="container">
    <div class="row" id="work-container">
      <div class="col-sm-12 col-md-4">
        <img src="{{ asset('img/favicons/proposalAsset2.png') }}">
        <h4>CARI</h4>
        <p>Temukan beragam tempat kursus terpercaya tanpa harus repot datang ke sana.</p>
      </div>
      <div class="col-sm-12 col-md-4">
        <img src="{{ asset('img/favicons/proposalAsset12.png') }}">
        <h4>DAFTAR</h4>
        <p>Kamu bisa langusng isi formulir pendaftaran lewat website kursusin melalui komputer atau smartphone.</p>
      </div>
      <div class="col-sm-12 col-md-4">
        <img src="{{ asset('img/favicons/proposalAsset7.png') }}">
        <h4>BAYAR</h4>
        <p>Bayar kursus semudah belanja online. Kamu bisa langsung transfer lewat atm atau online banking.</p>
      </div>
    </div>
  </div>
</section>
<section id="testimoni">
<h3>Testimoni</h3>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <img src="{{ asset('img/favicons/retno-01.jpg') }}" class="img-thumbnail" alt="testimoni">
      </div>
      <div class="col-sm-12 col-md-4">
        <img src="{{ asset('img/favicons/kursus-bahasa-inggris-01.jpg') }}" class="img-thumbnail" alt="testimoni">
      </div>
      <div class="col-sm-12 col-md-4">
        <img src="{{ asset('img/favicons/daftarkan-01.jpg') }}" class="img-thumbnail" alt="testimoni">
      </div>
    </div>
  </div>
</section>
@endsection
