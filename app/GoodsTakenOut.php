<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsTakenOut extends Model
{
   	protected $table="goods_taken_out_from_big_stock";
   	protected $fillable=['id','user_id','bigstock_id','quantity_out','item_destination'];
}
