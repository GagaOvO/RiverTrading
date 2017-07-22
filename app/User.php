<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'telephone_number','store_type','user_type','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admin()
    {
        if($this->user_type=='admin'){

            return true;
        }

        return false;
    }
    public function seller()
    {
        if($this->user_type=='seller'){

            return true;
        }

        return false;
    }
    public function stocker()
    {
        if($this->user_type=='stocker'){

            return true;
        }

        return false;
    }

    public function bigstock()
    {
        if($this->store_type=='bigstock'){

            return true;
        }

        return false;
    }

    public function smallstock()
    {
        if($this->store_type=='smallstock'){
            
            return true;
        }

        return false;
    }
    public function salestock()
    {
        if($this->store_type=='salestock'){
            
            return true;
        }

        return false;
    }
}
