<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('data_user')->insert([
            'id_user' => '1',
            'id_relasi_user' => '1',
            'id_user' => '1',
            'nama_user' => 'Aldo alfalus',
            'no_hp' => '081233822188',
            'alamat' => 'malang',
        ]);
    }
}
