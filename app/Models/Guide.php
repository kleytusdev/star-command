<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guide extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function entryGuides()
    {
        return $this->hasMany(EntryGuide::class);
    }

    protected $fillable = [
        'observation',
        'order_at',
        'created_by',
    ];
}
