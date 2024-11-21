<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    // Nama tabel dalam database
    protected $table = 'foto';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'galery_id',
        'file',
        'judul',
        'created_at',
        'updated_at'
    ];

    // Jika `galery_id` berelasi dengan tabel `galery`, bisa ditambahkan relasi berikut
    public function galery()
    {
        return $this->belongsTo(Galery::class, 'galery_id');
    }
}
