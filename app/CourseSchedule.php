<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseSchedule extends Model
{
    protected $table = 'ak_course_schedule';
    protected $primaryKey = 'ak_course_schedule_id';

    protected $fillable = [
    	'ak_course_schedule_detid',
    	'ak_course_schedule_day',
    	'ak_course_schedule_time',
    ];

    public $timestamps = false;
}
