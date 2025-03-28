<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_users')->insert([
            'user_id'            => '0000000001',
            'email'             => 'admin@email.com',
            'password'          => Hash::make('gVWrPwGoZz99u5'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
