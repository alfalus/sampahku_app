<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Illuminate\Support\Facades\DB;

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
                'role' => 'bank sampah',
                'deskripsi' => 'user bank sampah'
            ], 
            [
                'role' => 'rt/rw',
                'deskripsi' => 'user rt/rw'
            ], 
            [
                'role' => 'warga',
                'deskripsi' => 'admin warga'
            ]]
        );

        User::factory(5)->create();
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
