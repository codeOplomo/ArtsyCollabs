<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\Permission;;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
        ];
    }

    // Attach permissions to the role
    public function configure()
    {
        return $this->afterCreating(function (Role $role) {
            $role->permissions()->attach(Permission::inRandomOrder()->limit(3)->pluck('id'));
        });
    }

    // public function withPermission()
    // {
    //     return $this->afterCreating(function (Role $role) {
    //         $permission = Permission::factory()->create();
    //         $role->permissions()->attach($permission);
    //     });
    // }

    // public function admin()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'name' => 'admin',
    //         ];
    //     });
    // }

    // public function artist()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'name' => 'artist',
    //         ];
    //     });
    // }
}