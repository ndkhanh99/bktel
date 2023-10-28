<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RolesSeeder extends Seeder
{
   
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Administrator', 'note' => null],
            ['id' => 2, 'name' => 'Supervisor', 'note' => null],
            ['id' => 3, 'name' => 'Teacher', 'note' => null],
            ['id' => 4, 'name' => 'Student', 'note' => null],
        ]);
    }
}
