<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            [
                'supplier_name' => 'ELITech Group',
                'supplier_address' => '13-15 bis rue Jean Jaurès 92800 Puteaux • France',
                'supplier_email' => 'info@elitechgroup.com',
                'supplier_phone' => '+33 1 41 45 07 10',
                'supplier_fax' => '+33 1 41 45 07 19',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'supplier_name' => 'Boule',
                'supplier_address' => 'Domnarvsgatan 4
SE-163 53 Spånga, Sweden',
                'supplier_email' => 'info@boule.com',
                'supplier_phone' => '+46 8 7447700',
                'supplier_fax' => '+46 8 7447720',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
