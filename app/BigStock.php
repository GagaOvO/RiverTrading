<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BigStock extends Model
{
    protected $table="big_stocks";
    protected $fillable=
    ['id','user_id','item_code','item_name','item_desc','item_size','cartons','piece_per_cartons','cartons','quantity_out','item_destination','origin','approved_by','comment'];
}
