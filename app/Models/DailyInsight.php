<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyInsight extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'insight'];
    protected $casts = ['date' => 'date'];

}