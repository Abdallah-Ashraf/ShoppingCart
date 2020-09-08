<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    /*
     * get all Category Items
     */
    
    public function items() {
        return $this->hasMany("App\Item");
    }
}
