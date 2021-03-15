<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Model\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'thumbnail',
        'content',
    ];

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('id','DESC');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
