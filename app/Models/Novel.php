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

    public function id(): string
    {
        return (string) $this->id;
    }

    public function title(): string
    {
        return (string) $this->title;
    }

    public function author(): string
    {
        return (string) $this->author;
    }
    public function genre(): string
    {
        return (string) $this->genre;
    }

    public function image(): string
    {
        return (string) $this->image;
    }
    public function description(): string
    {
        return (string) $this->description;
    }

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
