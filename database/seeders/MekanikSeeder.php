<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MekanikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mekanik = [
            [
                'nama'              => 'Moch. Zulfan Akbar',
                'foto'              => '/images/zulfan.jpg',
                'jk'                => 'Laki-laki',
                'alamat'            => 'Banyuwangi',
                'telepon'           => '081249495027',
            ],
            [
                'nama'              => 'Noor Afiad',
                'foto'              => '/images/noor.jpg',
                'jk'                => 'Laki-laki',
                'alamat'            => 'Kota Probolinggo',
                'telepon'           => '082190909827',
            ],
        ];
        
        DB::table('mekanik')->insert($mekanik);
    }
}
