<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BinItem extends Model
{
    public function bin() {
        return $this->belongsTo('App\Bin');
    }


}
