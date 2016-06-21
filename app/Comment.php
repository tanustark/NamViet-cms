<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'body'];

    public function posts(){
        return $this->belongsTo(Post::class, 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'id');
    }
}
