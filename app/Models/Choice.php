<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = ['chapter_id', 'label', 'leads_to_chapter_id'];


    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function nextChapter()
    {
        return $this->belongsTo(Chapter::class, 'next_chapter_id');
    }
}
