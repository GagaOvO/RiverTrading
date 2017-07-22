<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminSmallStock extends Model
{
    protected $table="small_stocks";

    protected $fillable=['id','user_id','bigstock_id','size','cartons','piece_per_cartons','total','origin','approved_by','comment'];
}
