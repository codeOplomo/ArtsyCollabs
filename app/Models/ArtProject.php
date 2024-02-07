<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'budget',
        'image', // Add other fields as necessary
        'status',
        'start_date',
        'end_date',
    ];

    // ArtProject to Users relationship (many-to-many)
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // ArtProject to Partners relationship (many-to-many)
    public function partners()
    {
        return $this->belongsToMany(Partner::class);
    }
}