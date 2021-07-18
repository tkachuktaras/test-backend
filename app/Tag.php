<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'article_id', 'tag'
    ];

    public function article(){
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }
}
