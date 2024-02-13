<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// use \Laravel\Sanctum\HasApiTokens;
// use Laravel\Sanctum\HasApiTokens;
// use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use \Laravel\Sanctum\HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'role_id',
        'phone',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // User to Role relationship
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // User to ArtProjects relationship (many-to-many)
    public function artProjects()
    {
        return $this->belongsToMany(ArtProject::class)
            ->withPivot('request_status')
            ->withTimestamps();
    }

    public function hasRole($role)
    {
        return $this->role->name === $role;
    }

}
