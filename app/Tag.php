<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function threads()
    {
      return $this->belongsToMany('App\Threads');
    }
}
