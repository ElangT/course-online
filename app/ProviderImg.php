<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderImg extends Model
{
    protected $table = 'ak_provider_img';
    protected $primaryKey = 'ak_provider_img_id';

    protected $fillable = [
        'ak_provider_img_path'
    ];

    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
