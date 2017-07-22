<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TakenOutFromSaleStock extends Model
{
    protected $table="goods_taken_out_from_sale_stock";

    protected $fillable=['id','user_id','salestock_id','quantity_out','item_destination','approved_by'];

}
