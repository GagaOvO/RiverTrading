<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminSaleStock extends Model
{
    protected $table="sale_stocks";

    protected $fillable=['id','user_id','smallstock_id','size','cartons','piece_per_cartons','total','origin','approved_by','comment'];
}
