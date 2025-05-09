<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'foto',
        'level',
        'no_hp',
        'alamat',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the URL for the user's profile photo.
     */
    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/' . $this->foto) : asset('assets/images/default-profile.png');
    }

    /**
     * Check if user is admin
     */
    public function isAdmin()
    {
        return $this->level === 'admin';
    }

    /**
     * Check if user is petugas
     */
    public function isPetugas()
    {
        return $this->level === 'petugas';
    }

    /**
     * Check if user is regular member
     */
    public function isMember()
    {
        return $this->level === 'anggota';
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
