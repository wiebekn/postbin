<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bin extends Model
{
    protected $fillable = [
        'uuid',
    ];

    public function binItems() {
        return $this->hasMany('App\BinItem');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
