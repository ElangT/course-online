<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'ak_course_facility';
    protected $primaryKey = 'ak_course_facility_id';

    protected $fillable = [
    	'ak_course_facility_detid',
    	'ak_facility_type_id',
    ];

    public $timestamps = false;
}
