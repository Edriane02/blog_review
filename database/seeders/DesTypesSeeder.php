<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesTypesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('des_types')->insert([
            [
                'id' => 1,
                'designation' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'designation' => 'management',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'designation' => 'editor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}