<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['title', 'description'];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}

