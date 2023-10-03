<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
  {
    return $this->belongsTo(User::class);
  }

  protected $fillable = [
    'user_id',
    'created_by_user_id',
  ];
}
