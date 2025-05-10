<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function story()
{
    return $this->belongsTo(\App\Models\Story::class);
}

public function choices()
{
    return $this->hasMany(\App\Models\Choice::class);
}

}
