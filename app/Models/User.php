<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function collectables()
    {
        return $this->belongsToMany(Collectable::class, 'user_collectable');
    }

    public function totalCollectables()
    {
        return $this->collectables()->count();
    }

    // Method to get total number of adventure collectables
    public function totalAdventures()
    {
        return $this->collectables()->where('type', 'adventure')->count();
    }

    // Method to get total number of magic collectables
    public function totalMagic()
    {
        return $this->collectables()->where('type', 'magic')->count();
    }

    // Method to get total number of variant collectables
    public function totalVariants()
    {
        return $this->collectables()->where('type', 'variant')->count();
    }
}
