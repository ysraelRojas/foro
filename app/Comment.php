<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $fillable = ['comment', 'post_id'];

    public function post()
    {
    	$this->belongsTo(Post::class);
    }
}
