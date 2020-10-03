<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trust extends Model
{
  protected $fillable = [
    'user_id',
    'trusted_id',
  ];
}
