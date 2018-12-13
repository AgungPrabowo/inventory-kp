<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categorie_id')->unsigned()->nullable();
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->string('product_name', 100);
            $table->integer('product_price');
            $table->integer('product_qty');
            $table->string('product_unit');
            $table->string('product_packaging');
            $table->string('product_info', 255)->nullable();
            $table->string('product_serial_number', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
