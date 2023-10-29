<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UpdateRolesStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truy vấn và cập nhật giá trị null thành 4 (Student) cho các user
        DB::table('users')
                ->whereNull('role_id') // Tìm tất cả user có role_id là null
                ->update(['role_id' => 4]); // Cập nhật role_id thành 4 (Student)
    }
}
