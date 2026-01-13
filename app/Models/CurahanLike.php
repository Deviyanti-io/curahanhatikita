<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurahanLike extends Model
{
    use HasFactory;
    
    protected $fillable = ['curahan_id', 'username'];
    
    public function curahan()
    {
        return $this->belongsTo(Curahan::class);
    }
}