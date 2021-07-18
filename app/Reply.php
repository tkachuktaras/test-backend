<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'message', 'review_id'
    ];

    public function review(){
        return $this->hasOne(Review::class, 'review_id', 'id');
    }
}
