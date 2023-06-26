<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'genre',
        'image',
        'description'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_novel');
    }

    public function chapters()
    {
        return $this->hasMany(NovelChapter::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
