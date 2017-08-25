@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Provider Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('provider.edit.submit') }}">
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
    var prov = $('#province');
    var region = $('#region');

$( document ).ready(function() {
    if (prov.data('options') == undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
        prov.data('options', $('#region option').clone());
    }
    var id = $(prov).val();
    console.log(id);
    var options = $(prov).data('options').filter('[data-id=' + id + ']');
    console.log("JALAN FIRST TIME");
    region.html(options);
});


prov.change(function() {
    console.log(region.attr('name'));
    if ($(this).data('options') == undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
        $(this).data('options', $('#region option').clone());
    }
    var id = $(this).val();
    console.log(id);
    var options = $(this).data('options').filter('[data-id=' + id + ']');
    console.log(options);
    region.html(options);
});

</script>
@endsection