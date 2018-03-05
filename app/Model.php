<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    // main model to inherit from and improve security 
    protected $guarded = [];  //protects agains mass fill attack 
}
