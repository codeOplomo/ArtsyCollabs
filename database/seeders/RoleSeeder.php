<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()->create(['name' => 'Admin']);
        Role::factory()->create(['name' => 'Artist']);

        // $adminRole = Role::factory()->admin()->create();
        // $artistRole = Role::factory()->artist()->create();

        // // Assign permissions to roles
        // $adminRole->permissions()->attach(Permission::all());
        // $artistRole->permissions()->attach(Permission::inRandomOrder()->limit(3)->get());
    }
}