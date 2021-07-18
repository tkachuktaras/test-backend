<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'full_name', 'phone', 'message', 'article_id', 'rating', 'are_published'
    ];

    public function articles(){
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }

    public function reply(){
        return $this->hasOne(Reply::class, 'review_id', 'id');
    }
}
