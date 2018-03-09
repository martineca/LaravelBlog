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
    
}
