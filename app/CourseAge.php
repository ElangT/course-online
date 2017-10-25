<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseAge extends Model
{
    protected $table = 'ak_course_age';
    protected $primaryKey = 'ak_course_age_id';

    protected $fillable = [
    	'ak_course_age_id',
    	'ak_course_age_name_id',
        'ak_course_age_name_eng'
    ];

    public $timestamps = false;
}
