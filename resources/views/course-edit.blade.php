@extends('layouts.master')

@section('content')
<div class="panel">
        <form method="POST" action="{{url('provider/editcourse/'.$course->ak_provider_id)}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <!-- Start the Copas -->
        <label for="name">Nama</label> 
        <div class="form-group">
            <input class="form-control" required name="name" id="name" type="text" value="{{$course->ak_course_name}}">
        </div>
        <label for="maincat">Main Catagory</label> 
        <div class="form-group">
            <select class="form-control" required name="maincat" id="editmaincat">
                @foreach($maincat as $i)
                    @if($i->ak_maincat_id === $course->ak_maincat_id)
                        <option value="{{$i->ak_maincat_id}}" selected>{{$i->ak_maincat_name}}</option>
                    @else
                        <option value="{{$i->ak_maincat_id}}">{{$i->ak_maincat_name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <label for="subcat">Sub Catagory</label> 
        <div class="form-group">
            <select class="form-control" required name="subcat" id="editsubcat">
                @foreach($subcat as $i)
                    @if($i->ak_subcat_id === $course->ak_subcat_id)
                        <option data-id="{{$i->ak_subcat_parent}}" id="selected" value="{{$i->ak_subcat_id}}" selected>{{$i->ak_subcat_name}}</option>
                    @else
                        <option data-id="{{$i->ak_subcat_parent}}" value="{{$i->ak_subcat_id}}">{{$i->ak_subcat_name}}</option>
                    @endif
                @endforeach
            </select>
        </div>        
        <label for="price">Price</label> 
        <div class="form-group">
            <input class="form-control" required name="price" id="price" type="number" value="{{$course->ak_course_detail_price}}">
        </div>
        <label for="level">Level</label> 
        <div class="form-group">
            <select class="form-control" required name="level" id="editlevel">
                <option value="1">PEMULA</option>
                <option value="2">MENENGAH</option>
                <option value="3">MAHIR</option>
            </select>
        </div>
        <label for="age">Age</label> 
        <div class="form-group">
            <select class="form-control" required name="age" id="editage">
                <option value="1">ANAK-ANAK</option>
                <option value="2">REMAJA</option>
                <option value="3">DEWASA</option>
            </select>
        <script type="text/javascript">
        sel11 = $('#editmaincat');
        sel22 = $('#editsubcat');

        if (sel11.data('options') == undefined) {
        /*Taking an array of all options-2 and kind of embedding it on the select1*/
            sel11.data('options', $('#editsubcat option').clone());
        }
        var id = sel11.val();
        var options = sel11.data('options').filter('[data-id=' + id + ']');
        sel22.html(options);

            $('#editlevel option[value='+{{$course->ak_course_level_id}}+']').attr('selected', true);
            $('#editage option[value='+{{$course->ak_course_age_id}}+']').attr('selected', true);
            
        </script>
        <div id="schedule">
            <label>Schedule</label>
            <?php
                $count = 0;    
            ?>
            @foreach($schedules as $i)
                <?php
                    $count++; 
                ?>    
                @if($count === 1)
                    <div id="schedule1" class="scheduleinput">
                        <div class="form-group row">
                            <div class="col-md-5">
                                <input class="form-control" required name="day1" id="day1" type="text" value="{{$i->ak_course_schedule_day}}">
                            </div>
                            <div class="col-md-5">
                                <input class="form-control" required name="time1" id="time1" type="text" value="{{$i->ak_course_schedule_time}}">
                            </div>
                            <div class="col-md-2">
                                {{-- <input type="button" class="btndelete" id="btn1" value="x"> --}}
                            </div>
                        </div>
                    </div>
                @else

                    <div id="{{"schedule".$count}}" class="scheduleinput">
                        <div class="form-group row">
                            <div class="col-md-5">
                                <input class="form-control" required name="{{"day".$count}}}" id="{{"day".$count}}}" type="text" value="{{$i->ak_course_schedule_day}}">
                            </div>
                            <div class="col-md-5">
                                <input class="form-control" required name="{{"time".$count}}}" id="{{"time".$count}}}" type="time" value="{{$i->ak_course_schedule_time}}">
                            </div>
                            <div class="col-md-2">
                                <input type="button" class="btndelete" id="{{"btn".$count}}}" value="x">
                            </div>
                        </div>
                    </div>

                @endif
            @endforeach
        </div>
        <input type="hidden" name="jmlschedule" id="jml" value="{{$count}}"> 
        <div class="form-group">
            <button class="btn btn-primary" id="addschedule">Add Schedule</button>
        </div>

        </div>
        <label for="size">Size</label> 
        <div class="form-group">
            <input class="form-control" required name="size" id="size" type="number" value={{$course->ak_course_detail_size}}>
        </div>

        <label for="seat">Seat</label> 
        <div class="form-group">
            <input class="form-control" required name="seat" id="seat" type="number" value="{{$course->ak_course_detail_seat}}">
        </div>

        <label for="description">Description</label> 
        <div class="form-group">
            <textarea class="form-control" rows="3" name="description" id="description">{{$course->ak_course_detail_desc}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">SUBMIT</button>
        </div>
        <div class="form-group">
            <button type="reset" class="btn btn-primary">RESET</button>
        </div>

        <!-- End the Copas -->
        </form>
      </div>
@endsection
