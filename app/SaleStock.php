<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleStock extends Model
{
    protected $table="sale_stocks";

    protected $fillable=['id','smallstock_id','quantity_received','quantity','status','comment'];
}
