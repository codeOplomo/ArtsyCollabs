<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Remove 'permissions' from fillable

    // Define the relationship with the User model
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    // Method to attach a single permission
    public function attachPermission($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->first();
        }

        if ($permission instanceof Permission) {
            $this->permissions()->syncWithoutDetaching($permission);
        }
    }

    // Method to detach a single permission
    public function detachPermission($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->first();
        }

        if ($permission instanceof Permission) {
            $this->permissions()->detach($permission);
        }
    }
}