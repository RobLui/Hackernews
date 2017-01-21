<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Votes extends Model
{
  use SoftDeletes;

  protected $fillable = [
       'up_down',
       'voted_by',
       'article_id',
       'value'
  ];
}
