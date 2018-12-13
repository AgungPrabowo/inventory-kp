<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';

    public function product() {
        return $this->belongsTo('App\Product');
    }
}
