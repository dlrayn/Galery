<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Ubah menjadi Authenticatable
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Petugas extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi dengan model Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
