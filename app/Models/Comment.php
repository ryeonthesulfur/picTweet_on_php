<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // コメントは1人のユーザに属する
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // コメントは1つのツイートに属する
    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }
}
