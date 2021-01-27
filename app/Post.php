<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['post_title', 'post_subtitle', 'post_text'];

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
