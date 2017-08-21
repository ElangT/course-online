@extends('layouts.master')

@section('content')
<div class="panel">
        <form method="POST" action="{{url('provider/editcourse/'.$course->ak_provider_id)}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        @include('partial.course-form');
        </form>
      </div>
@endsection
@section('extra-js')
<script type="text/javascript">
sel11 = $('#maincat');
sel22 = $('#subcat');

if (sel11.data('options') == undefined) {
/*Taking an array of all options-2 and kind of embedding it on the select1*/
    sel11.data('options', $('#subcat option').clone());
}
var id = sel11.val();
var options = sel11.data('options').filter('[data-id=' + id + ']');
sel22.html(options);

    $('#level option[value='+{{$course->ak_course_level_id}}+']').attr('selected', true);
    $('#age option[value='+{{$course->ak_course_age_id}}+']').attr('selected', true);
    
</script>
@endsection