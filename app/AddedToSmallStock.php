<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddedToSmallStock extends Model
{
    protected $table="added_to_small_stocks";

    protected $fillable =['id','user_id','smallstock_id','quantity_added','approved_by'];
}
