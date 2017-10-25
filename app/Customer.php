<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'ak_user';
    protected $primaryKey = 'ak_user_id';

    protected $fillable = [
        'ak_user_firstname',
        'ak_user_lastname',
        'ak_user_email',
        'ak_user_password',
        'ak_user_dob',
        'ak_user_phone',
    ];

    public $timestamps = false;
}
