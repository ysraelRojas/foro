<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Post, Comment};

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
    	
    	$this->validate($request, [
    		'comment' => 'required'
    	]);

    	auth()->user()->comment($post, $request->get('comment'));

    	return redirect($post->url);
    }
}
