<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sparepart = [
            [
                'sparepart'         => 'Filter Udara',
                'stok'              => '12',
                'harga'             => '32000',
            ],
            [
                'sparepart'         => 'Kampas Rem Depan',
                'stok'              => '4',
                'harga'             => '37000',
            ],
            [
                'sparepart'         => 'Kampas Rem Belakang',
                'stok'              => '12',
                'harga'             => '30000',
            ],
            [
                'sparepart'         => 'Rantai',
                'stok'              => '2',
                'harga'             => '65000',
            ],
        ];
        
        DB::table('sparepart')->insert($sparepart);
    }
}
