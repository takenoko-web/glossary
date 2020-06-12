<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Word extends Model
{
    //
    protected $fillable = [
        'word',
        'read',
        'content',
    ];
    
    public function tags() :BelongsToMany
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
