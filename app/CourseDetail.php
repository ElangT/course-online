<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
    protected $table = 'ak_course_detail';
    protected $primaryKey = 'ak_course_detail_id';

    protected $fillable = [
        'ak_course_id',
    	'ak_course_detail_name',
    	'ak_course_detail_price',
    	'ak_course_detail_level',
    	'ak_course_detail_age',
    	'ak_course_detail_size',
    	'ak_course_detail_desc',
        'ak_course_detail_seat',
    ];
    public function getId(){
        return $this->ak_course_detail_id;
    }
    public $timestamps = false;
}
