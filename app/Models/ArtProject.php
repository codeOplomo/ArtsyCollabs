<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ArtProject extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

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
        return $this->belongsToMany(User::class)
            ->withPivot('request_status')
            ->withTimestamps();
    }

    // ArtProject model
    public function artProjects()
    {
        return $this->belongsToMany(User::class);
    }


    // ArtProject to Partners relationship (many-to-many)
    public function partners()
    {
        return $this->belongsToMany(Partner::class);
    }
    
}