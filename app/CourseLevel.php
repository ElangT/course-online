<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseLevel extends Model
{
    protected $table = 'ak_course_level';
    protected $primaryKey = 'ak_course_level_id';

    protected $fillable = [
    	'ak_course_level_id',
    	'ak_course_level_name'
    ];

    public $timestamps = false;
}
