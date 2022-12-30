<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        DB::table('users')->insert([
            'role_id'=>1,
            'name'=>'BMVT',
            'password'=>Hash::make('Bmvt@hcmut'),
            'email'=>'bmvt@hcmut.edu.vn',    
        ]);
    }
}

