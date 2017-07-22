<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TakenOutFromSmallStock extends Model
{
    protected $table="goods_taken_out_from_small_stock";

    protected $fillable=['id','user_id','smallstock_id','quantity_out','item_destination'];
}
