<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Administrator', 'note' => 'Administrator role'],
            ['id' => 2, 'name' => 'Supervisor', 'note' => 'Supervisor role'],
            ['id' => 3, 'name' => 'Teacher', 'note' => 'Teacher role'],
            ['id' => 4, 'name' => 'Student', 'note' => 'Student role'],
        ]);
    }
}
