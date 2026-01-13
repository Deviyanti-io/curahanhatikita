<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KataMutiara extends Model
{
    use HasFactory;
    
    protected $fillable = ['quote', 'author', 'created_by'];
    
    public function isOwnedBy($username)
    {
        return $this->created_by === $username;
    }
}