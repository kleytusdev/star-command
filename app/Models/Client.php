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

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    protected $fillable = [
        'id',
        'clientable_type',
        'clientable_id',
    ];
}
