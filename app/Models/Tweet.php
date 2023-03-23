<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Photo;

class Tweet extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'text',
    ];

    public function photo()
    {
        return $this->hasOne(Photo::class);
    }
}

