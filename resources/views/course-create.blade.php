@extends('layouts.master')

@section('content')

@foreach ($errors->all() as $error)
  <div>{{ $error }}</div>
@endforeach

<div class="panel">
        <form method="POST" action="{{route('course.store.submit')}}">
        {{ csrf_field() }}
            @include('partial.course-form')
        </form>
      </div>
@endsection
@section('extra-js')
<script>

var sel1 = $('#maincat');
var sel2 = $('#subcat');

$(document).ready(function(){
    sel2.attr("disabled", "true");
});

sel1.change(function() {
    var disabled = sel2.attr('disabled');
    console.log(sel2.attr('name'));
    if(typeof disabled !== typeof undefined && disabled !== false){
        sel2.removeAttr('disabled');
    }
    if ($(this).data('options') == undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
        $(this).data('options', $('#subcat option').clone());
    }
    var id = $(this).val();
    var options = $(this).data('options').filter('[data-id=' + id + ']');
    sel2.html(options);
});


</script>
@endsection