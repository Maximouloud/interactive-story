<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    public function chapter()
{
    return $this->belongsTo(\App\Models\Chapter::class);
}

public function nextChapter()
{
    return $this->belongsTo(\App\Models\Chapter::class, 'next_chapter_id');
}

}
