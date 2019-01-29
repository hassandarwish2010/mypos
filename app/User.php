<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $appends=['image_path'];

    protected $hidden = [
        'password', 'remember_token',
    ];


    function getFirstNameAttribute($value){

        return ucfirst($value);

    }//end getFirstName

       function getLastNameAttribute($value){

        return ucfirst($value);

    }//end getLastName


    function getImagePathAttribute(){

        return asset('uploads/users_images/'.$this->image);

    }//end getImagePathAttribute
}
