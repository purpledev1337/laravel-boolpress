<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'text',
        'user_id',
        'cat_id'
    ];

    public function user() {

        return $this->belongsTo(User::class);
    }

    public function cat() {

        return $this->belongsTo(Cat::class);
    }
}
