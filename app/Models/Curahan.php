<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curahan extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'content', 'author', 'is_anonymous'];
    
    protected $casts = [
        'is_anonymous' => 'boolean',
    ];

    // --- Relasi ---

    public function likes()
    {
        return $this->hasMany(CurahanLike::class);
    }

    /**
     * Relasi untuk semua komentar tanpa filter.
     * Digunakan untuk menghitung total komentar (termasuk balasan).
     */
    public function allComments()
    {
        return $this->hasMany(CurahanComment::class);
    }

    /**
     * Relasi untuk komentar utama (bukan reply).
     */
    public function comments()
    {
        return $this->hasMany(CurahanComment::class)
            ->whereNull('parent_id')
            ->orderBy('created_at', 'desc');
    }

    // --- Helper Methods ---

    public function isLikedBy($username)
    {
        return $this->likes()->where('username', $username)->exists();
    }

    public function likesCount()
    {
        return $this->likes()->count();
    }

    public function commentsCount()
    {
        return $this->allComments()->count();
    }

    /**
     * Cek apakah user adalah pemilik (untuk edit/delete).
     */
    public function isOwnedBy($username)
    {
        return $this->author === $username;
    }

    // --- Accessors ---

    /**
     * Attribute untuk menampilkan nama (Anonim atau nama asli).
     * Panggil dengan: $curahan->display_name
     */
    public function getDisplayNameAttribute()
    {
        return $this->is_anonymous ? 'Anonim' : $this->author;
    }
}