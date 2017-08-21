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
