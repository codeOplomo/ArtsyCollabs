<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'permissions', // Make sure this aligns with the fields you have in your migration
    ];

    // Define the relationship with the User model
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
