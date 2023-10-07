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
            'project_name' => 'Pengembangan Website',
            'slug' => 'pengembangan-website',
            'project_division' => 'Developer',
            'project_client' => 'Manajer Proyek',
            'project_status' => 'Sedang Dikerjakan',
            'project_budget' => '2.000.000',
            'project_description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas facere ipsum in dolorem, provident tenetur ab necessitatibus labore dicta, impedit pariatur nam, magni nostrum. Blanditiis magnam sed harum quae ut!'
        ]);
    }
}
