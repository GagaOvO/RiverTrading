<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecentlyAdded extends Model
{
    protected $table="recently_added";

    protected $fillable=['id','bigstock_id','quantity_added','approved_by'];
}
