<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_info', // Add other fields as necessary
        'description',
    ];

    // Partner to ArtProjects relationship (many-to-many)
    public function artProjects()
    {
        return $this->belongsToMany(ArtProject::class);
    }
}