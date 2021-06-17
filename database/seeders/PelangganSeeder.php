<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pelanggan = [
            [
                'nama'              => 'Pramudya Wibowo',
                'foto'              => '/images/pram.jpg',
                'jk'                => 'Laki-laki',
                'alamat'            => 'Kota Probolinggo',
                'tgl'               => '04-06-2021',
                'jenis'             => 'Honda Supra',
                'nopol'             => 'B 2312 AB',
            ],
            [
                'nama'              => 'Abdur Rozak',
                'foto'              => '/images/rozak.jpg',
                'jk'                => 'Laki-laki',
                'alamat'            => 'Kota Probolinggo',
                'tgl'               => '02-06-2021',
                'jenis'             => 'Honda Beat',
                'nopol'             => 'B 2390 AC',
            ],
            [
                'nama'              => 'Dandi Agung Setiawan',
                'foto'              => '/images/dandi.jpg',
                'jk'                => 'Laki-laki',
                'alamat'            => 'Lumajang',
                'tgl'               => '28-05-2021',
                'jenis'             => 'Honda CRF',
                'nopol'             => 'B 2902 YU',
            ],
            [
                'nama'              => 'Auzan Ihtifazuddin',
                'foto'              => '/images/auzan.jpg',
                'jk'                => 'Laki-laki',
                'alamat'            => 'Jember',
                'tgl'               => '30-05-2021',
                'jenis'             => 'Honda Vario',
                'nopol'             => 'B 3401 JB',
            ],
        ];
        
        DB::table('pelanggan')->insert($pelanggan);
    }
}
