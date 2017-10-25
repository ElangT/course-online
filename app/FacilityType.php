<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityType extends Model
{
    protected $table = 'ak_facility_type';
    protected $primaryKey = 'ak_facility_type_id';

    protected $fillable = [
    	'ak_facility_type_name_idn',
    	'ak_facility_type_name_eng',
    ];

    public $timestamps = false;
}
