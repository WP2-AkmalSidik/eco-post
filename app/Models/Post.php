<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    protected $fillable = ['user_id', 'title', 'slug', 'image_path','views', 'body'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Categorie::class, 'post_category', 'post_id', 'category_id');
    }
    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->body));
        $minutes = ceil($wordCount / 200); // 200 words per minute
        return $minutes;
    }

    // app/Models/Post.php
    public function totalCommentsCount()
    {
        return $this->comments()->count(); // Ini akan menghitung semua komentar termasuk replies
    }
}

