<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ArtProject;

class ArtProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        ArtProject::factory()->count(5)->create();
    }
}
