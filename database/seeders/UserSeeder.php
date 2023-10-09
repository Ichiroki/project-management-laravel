<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Provider\ja_JP\Address;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Hash};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'avatar' => 'mirai-7.jpg',
            'name' => 'Mirai Kuriyama',
            'email' => 'mirai@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now()
        ]);
    }
}
