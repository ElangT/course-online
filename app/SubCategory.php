<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'ak_sub_category';
    protected $primaryKey = 'ak_subcat_id';

    protected $fillable = [
    	'ak_subcat_id',
        'ak_subcat_parent',
    	'ak_subcat_name'
    ];

    public $timestamps = false;
}
