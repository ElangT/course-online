@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Provider Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('provider.register.submit') }}">
                        {{ csrf_field() }}
                        @include('partial.provider-form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extra-js')
<script>
$(document).ready(function(){
    $('#region').attr("disabled", "true");
});
</script>
@endsection