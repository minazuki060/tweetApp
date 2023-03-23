<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tweet;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tweet_id',
        'file_name',
    ];

    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }
}
