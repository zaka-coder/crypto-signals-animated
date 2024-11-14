<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
  protected $guarded = ['id'];

  protected $casts = [
    'expires_at' => 'datetime',
    'starts_at' => 'datetime',
    'status' => 'string',
    'is_current' => 'boolean',
  ];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

}
