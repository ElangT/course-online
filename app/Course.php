<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'ak_course';
    protected $primaryKey = 'ak_course_id';

    protected $fillable = [
    	'ak_course_name',
        'ak_course_cat_id',
        'ak_course_prov_id',
        'ak_course_active',
        'ak_course_open'
    ];

    public $timestamps = false;
}
