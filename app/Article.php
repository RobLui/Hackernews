<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  // return the comments on this article
  public function Category()
  {
      return $this->belongsTo('App\Comment');
  }
  public function Tags()
  {
    return $this->belongsToMany('App\Tag');
  }
  public function Comments()
  {
    return $this->hasMany('App\Comment');
  }
}
