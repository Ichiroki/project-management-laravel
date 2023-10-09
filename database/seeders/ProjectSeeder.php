<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            'name' => 'Pengembangan Website',
            'slug' => 'pengembangan-website',
            'client' => 'Portfolio',
            'status' => 'Sedang Dikerjakan',
            'budget' => number_format(2000000, 0, ',', '.'),
            'project_manager_id' => 1,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas facere ipsum in dolorem, provident tenetur ab necessitatibus labore dicta, impedit pariatur nam, magni nostrum. Blanditiis magnam sed harum quae ut!'
        ]);
    }
}
