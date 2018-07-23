<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model {
    protected $table = 'categories';
    protected $fillable = array('categorie_name');

    // Relasi One-to-Many
    public function products() {
        return $this->hasMany('App\Product');
    }
}