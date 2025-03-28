<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserProfileSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admin_user_profiles')->insert([
            'user_id' => '0000000001',
            'fname' => 'The Eastern Review',
            'lname' => 'Admin',
            'user_type_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
