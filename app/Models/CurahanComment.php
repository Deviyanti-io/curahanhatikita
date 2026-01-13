<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurahanComment extends Model
{
    use HasFactory;
    
    protected $fillable = ['curahan_id', 'username', 'comment', 'parent_id'];
    
    public function curahan()
    {
        return $this->belongsTo(Curahan::class);
    }
    
    // Relasi ke parent comment
    public function parent()
    {
        return $this->belongsTo(CurahanComment::class, 'parent_id');
    }
    
    // Relasi ke replies (balasan)
    public function replies()
    {
        return $this->hasMany(CurahanComment::class, 'parent_id')->orderBy('created_at', 'asc');
    }
    
    // Cek apakah ini reply
    public function isReply()
    {
        return $this->parent_id !== null;
    }
}