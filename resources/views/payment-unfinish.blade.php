@extends('layouts.master')

@section('content')
<h1>Payment Unfinish</h1>
<div class="alert alert-success" role="alert">Transaksi Sukses</div>
<div class="panel panel-default">
<div class="panel panel-body">
	<div>Status 	:	{{ucfirst($snap->status_message)}}</div>
	<div>Harga		:	Rp. {{$snap->gross_amount}}</div>
	<div>Pembayaran	:	{{ucfirst(preg_replace('/[^A-Za-z0-9\-]/', ' ', $snap->payment_type))}}</div>	
	<div>Waktu		:	{{$snap->transaction_time}}</div>	
</div>

<pre>{{$request}}</pre>
@endsection
