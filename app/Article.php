<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'title', 'img', 'short_description', 'description', 'are_published', 'views'
    ];

    public function reviews(){
        return $this->hasMany(Review::class, 'article_id', 'id')->where('are_published', 1);
    }

    public function tags(){
        return $this->hasMany(Tag::class, 'article_id', 'id');
    }
}
