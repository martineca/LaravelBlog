<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = ['name'];
    public function posts()

    {
    	return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName() 
    {

    	return 'name';

    }

    public function addTag($name){

		$this->tags()->create(['name' => $body]);
		
	}
}
