<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddedToSaleStock extends Model
{
    protected $table="added_to_sale_stocks";

    protected $fillable =['id','user_id','salestock_id','quantity_added','approved_by'];
}
