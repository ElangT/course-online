<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Provider extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'ak_provider_id';
    protected $table = 'ak_provider';
    protected $guard = 'provider';
    public $timestamps = false;
    protected $fillable = [
        'ak_provider_firstname',
    	'ak_provider_lastname',
        'ak_provider_email',
        'ak_provider_password',
        'ak_provider_region',
        'ak_provider_address',
        'ak_provider_zipcode',
        'ak_provider_description',
        'ak_provider_telephone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'ak_provider_password', 'remember_token',
    ];
    public function getId(){
        return $this->ak_provider_id;
    }
    public function getAuthPassword()
    {
        return $this->ak_provider_password;
    }

}
