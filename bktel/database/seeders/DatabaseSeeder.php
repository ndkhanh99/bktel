<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();\
        for ($x = 0; $x <= 20; $x++) {
        DB::table('students')->insert([
            'last_name' => Str::random(10),
            'first_name' => Str::random(10),
            'student code' => Str::random(10),
            'note' => Str::random(10),
        ]); }

 
        DB::table('users') ->insert([
            'email'  =>'bmvt@hcmut.edu.vn',
            'name' => 'BMVT',
            'password' => 'Bmvt@hcmut',
            'role_id' => 1 ]);
    
}
}
