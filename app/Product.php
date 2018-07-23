<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    // name table
    protected $table = 'products';

    // Mass Assignment
    // Untuk membatasi attribut yang boleh diisi 
    protected $fillable = array('product_name','categorie_id','product_price','product_qty','product_info');

    // Relasi One-to-Many
    public function categorie() {
        return $this->belongsTo('App\Categorie');
    }

    // Relasi One-to-Many
    public function supplier() {
        return $this->belongsTo('App\Supplier');
    }
}