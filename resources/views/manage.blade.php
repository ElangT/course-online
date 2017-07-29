@extends('layouts.master')

@section('content')
<h1>Manage Student</h1>
<h1>Success</h1>
<?php $count = 0;?>
@foreach($course->success as $i)
	@if($i->ak_tran_saction_status === 1)
	<?php $count++;?>
    <pre>{{var_dump($i)}}</pre>
    @endif
@endforeach
<p> Total Success: {{$count}} </p><h1>Pending</h1>
<?php $count = 0;?>
@foreach($course->pending as $i)
	@if($i->ak_tran_saction_status === 2)
	<?php $count++;?>
    <pre>{{var_dump($i)}}</pre>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('status.change.submit') }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name="transactionid" value="{{$i->ak_tran_saction_id}}">
        <select name="statuspembayaran">
        	<option value="1">Success</option>
        	<option value="3">Fail</option>
        </select>
        <button type="submit">Change</button>
    </form>
    @endif
@endforeach
<p> Total Pending: {{$count}} </p>
<h1>Fail</h1>
<?php $count = 0;?>
@foreach($course->error as $i)
	@if($i->ak_tran_saction_status === 3)
	<?php $count++;?>
    <pre>{{var_dump($i)}}</pre>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('status.change.submit') }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name="transactionid" value="{{$i->ak_tran_saction_id}}">
        <select name="statuspembayaran">
        	<option value="1">Success</option>
        	<option value="2">Pending</option>
        </select>
        <button type="submit">Change</button>
    </form>
    @endif
@endforeach
<p> Total Fail: {{$count}} </p>
<h1>Fail</h1>
<?php $count = 0;?>
@foreach($course->error as $i)
    @if($i->ak_tran_saction_status === 4)
    <?php $count++;?>
    <pre>{{var_dump($i)}}</pre>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('status.change.submit') }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name="transactionid" value="{{$i->ak_tran_saction_id}}">
        <select name="statuspembayaran">
            <option value="1">Success</option>
            <option value="2">Pending</option>
        </select>
        <button type="submit">Change</button>
    </form>
    @endif
@endforeach
<p> Total Fail: {{$count}} </p>

@endsection
