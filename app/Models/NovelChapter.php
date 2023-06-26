<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NovelChapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'novel_id',
        'chapter',
        'content'
    ];


    public function novel()
    {
        return $this->belongsTo(Novel::class);
    }
}
