<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $table = 'ak_main_category';
    protected $primaryKey = 'ak_maincat_id';

    protected $fillable = [
    	'ak_maincat_name'
    ];

    public $timestamps = false;
}
