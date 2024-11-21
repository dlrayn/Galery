<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;

    protected $table = 'galery'; // Tentukan nama tabel secara eksplisit
    
    protected $fillable = [
        'post_id',
        'position',
        'status',
    ];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
