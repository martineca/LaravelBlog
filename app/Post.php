<?php

namespace App;


class Post extends Model
{


	public function comments()
	{

		return $this->hasMany(Comment::class);
	}	



	public function addComment($body, $userid){

		$this->comments()->create(['body' => $body, 'user_id' => $userid]);
		
	}

	public function user()
	{

		return $this->belongsTo(User::class);
	}

	public function tags()
	{
		// link tags to posts
		// any tag may be applied to many posts
		return $this->belogsToMany(Tag::class);

	}
    
}
