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
            'user_picture' => 'mirai-7.jpg',
            'user_firstName' => 'Mirai',
            'user_lastName' => 'Kuriyama',
            'user_email' => 'mirai@gmail.com',
            'user_born' => Carbon::create('1999', '3', '30'),
            'user_address' => fake('id_ID')->address(),
            'user_city' => fake('id_ID')->city(),
            'user_state' => fake('id_ID')->streetAddress(),
            'user_password' => Hash::make('password'),
            'created_at' => Carbon::now()
        ]);
    }
}
