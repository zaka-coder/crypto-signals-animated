<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
  use SoftDeletes;

  protected $guarded = ['id'];

  protected $casts = [
    'starts_at' => 'datetime',
    'expires_at' => 'datetime',
    'blocked_at' => 'datetime',
    'unblocked_at' => 'datetime',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    'deleted_at' => 'datetime',
  ];

  public function subscriptionsHistory()
  {
    return $this->hasMany(Subscription::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

}
