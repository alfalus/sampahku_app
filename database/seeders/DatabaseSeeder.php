<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Sampah;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\DataUserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        // $this->call([
        //     RoleSeeder::class,
        // ]);
        DB::table('role')->insert([
            [
                'role' => 'bank sampah', //1
                'deskripsi' => 'user bank sampah'
            ], 
            [
                'role' => 'rt/rw', //2
                'deskripsi' => 'user rt/rw'
            ], 
            [
                'role' => 'warga', //3
                'deskripsi' => 'admin warga'
            ]]
        );

        User::factory(5)->create();
        
        DB::table('data_user')->insert([
            'id_user' => '1',
            'id_relasi_user' => '1',
            'id_user' => '1',
            'nama_user' => 'Aldo alfalus',
            'jenis_kel' => 'L',
            'ttl' => 'Kediri, 20 juni 1999',
            'no_hp' => '081233822188',
            'alamat' => 'Jalan diponegoro, batu, malang',
        ]);

        Sampah::factory(8)->create();


        // DB::table('user')->insert([
        //     'id_role' => '1',
        //     'email' => 'aldo@gmail.com',
        //     'password' => bcrypt('admin'),
        //     'tanggal_dibuat' => now(),
        //     'tanggal_update' => null,
        //     'status' => 'active'
        // ]);
    }
    
}
