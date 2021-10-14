<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PromotionalCode extends Model
{
  use HasFactory;

  protected $fillable = [
    'code',
    'user_id'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function createRandomCode($length)
  {
    return substr(md5(time()), 0, $length);
  }
}
