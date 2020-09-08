<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    /*
     * get all Brand Items
     */
    public function items() {
        return $this->hasMany("App\Item");
    }
}
