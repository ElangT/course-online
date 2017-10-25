<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'ak_tran_saction';
    protected $primaryKey = 'ak_tran_saction_id';

    protected $fillable = [
    	'ak_tran_saction_type',
    	'ak_tran_saction_status',
    	'ak_tran_saction_user',
    	'ak_tran_saction_course',
    ];

    public $timestamps = false;
}
