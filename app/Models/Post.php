<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = ['post_title', 'content', 'user_id', 'status', 'cover'];

    public function scopeSearch($query, $value)
    {
        $query->where('post_title','like',"%{$value}%");
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
