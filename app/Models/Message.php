<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = [
    'user_id',
    'message',
    'title',
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User', 'profile_id');
  }

  public function replies()
  {
    return $this->hasMany('App\Models\Message', 'message_id');
  }
}
