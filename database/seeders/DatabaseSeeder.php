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
                'role' => 'satpel', //1
                'deskripsi' => 'user satpel'
            ], 
            [
                'role' => 'bank sampah', //2
                'deskripsi' => 'user rt/rw'
            ], 
            [
                'role' => 'nasabah', //3
                'deskripsi' => 'user warga'
            ],
            [
                'role' => 'admin', //4
                'deskripsi' => 'user admin'
            ]
            
        ]);

        User::factory(5)->create();
        
        DB::table('satpel')->insert([
            'id_satpel' => '1',
            'id_user' => '1',
            'nama_satpel' => 'Satpel Johar Baru',
            'alamat' => 'Kecamatan Johar Baru',
            'no_hp' => '08124212558',
            'status' => 'active',
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
