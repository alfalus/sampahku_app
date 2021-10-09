<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
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
        
    }
}
