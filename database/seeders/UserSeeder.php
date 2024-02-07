<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;    
use App\Models\Role;    

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the "artist" role
        // $artistRole = Role::where('name', 'artist')->first();

        // // Create 10 users and assign them the "artist" role
        // User::factory()->count(10)->create([
        //     'role_id' => $artistRole->id,
        // ]);

        $adminRole = Role::where('name', 'Admin')->first();
        $editorRole = Role::where('name', 'Artist')->first();

        User::factory(5)->create(['role_id' => $editorRole->id]);
        User::factory(1)->create(['role_id' => $adminRole->id]);
    }
}