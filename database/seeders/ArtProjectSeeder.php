<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ArtProject;
use App\Models\User;
use App\Models\Partner;

class ArtProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();
        $partners = Partner::all();

        ArtProject::factory(10)->create()->each(function ($artProject) use ($users, $partners) {
            $artProject->users()->attach($users->random(3));
            $artProject->partners()->attach($partners->random(2));
        });
    }
}