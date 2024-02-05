<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition()
    {
        // This factory will not be used for random role generation
        return [];
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'admin',
                'permissions' => json_encode(['all']),
            ];
        });
    }

    public function artist()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'artist',
                'permissions' => json_encode(['view', 'create', 'update']),
            ];
        });
    }
}

