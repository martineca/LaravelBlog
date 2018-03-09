<?php

namespace App;


class Comment extends Model
{
    // links comments to posts and users

    public function post()
	{
		return $this->belongsTo(Post::class);
	}

	public function user()
	{

		return $this->belongsTo(User::class);
	}
}
