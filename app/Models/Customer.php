<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
  use SoftDeletes;
  
  protected $guarded = ['id'];

  public function subscriptionsHistory()
  {
    return $this->hasMany(Subscription::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

}
