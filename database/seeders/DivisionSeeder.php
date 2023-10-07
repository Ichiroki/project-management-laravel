<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisions')->insert(
        [
            'division_name' => 'Developer',
            'division_status' => 'active'
        ]);

        DB::table('divisions')->insert([
            'division_name' => 'Designer',
            'division_status' => 'active'
        ]);

        DB::table('divisions')->insert(
            [
                'division_name' => 'Digital Marketing',
                'division_status' => 'active'
            ]
        );
    }
}
