<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'product_name' => 'Medonic M-32 B',
                'product_price' => 99700000,
                'categorie_id' => 1,
                'supplier_id' => 2,
                'product_qty' => 5,
                'product_unit' => 'Unit',
                'product_packaging' => '',
                'product_info' => 'Garansi alat 1 tahun dan garansi Shear Valve selama 3 tahun.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'product_name' => 'Selectra Pro XL',
                'product_price' => 710000000,
                'categorie_id' => 2,
                'supplier_id' => 1,
                'product_qty' => 2,
                'product_unit' => 'Unit',
                'product_packaging' => '',
                'product_info' => 'Garansi alat 1 tahun dan garansi Bellows Pump selama 3 tahun.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'product_name' => 'Microlab 300',
                'product_price' => 84200000,
                'categorie_id' => 2,
                'supplier_id' => 1,
                'product_qty' => 5,
                'product_unit' => 'Unit',
                'product_packaging' => '',
                'product_info' => 'Garansi alat 1 Tahun dan garansi Bellows Pump selama 3 tahun.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'product_name' => 'Aqua DM',
                'product_price' => 150000,
                'categorie_id' => 3,
                'supplier_id' => 3,
                'product_qty' => 50,
                'product_unit' => 'Galon',
                'product_packaging' => '20 Liter',
                'product_info' => '',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'product_name' => 'HBsAb Strip',
                'product_price' => 750000,
                'categorie_id' => 3,
                'supplier_id' => 4,
                'product_qty' => 50,
                'product_unit' => 'Box',
                'product_packaging' => '50 Pcs',
                'product_info' => '',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
