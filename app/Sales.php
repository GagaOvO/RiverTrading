<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table="sales";

    protected $fillable=['id','salestock_id','quantity_being_sold','taken_by']
}
