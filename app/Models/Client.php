<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function clientable()
    {
        return $this->morphTo();
    }

    protected $fillable = [
        'id',
        'clientable_type',
        'clientable_id',
    ];
}
