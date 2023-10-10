<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntryGuide extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'reason',
        'status',
        'quantity',
        'entry_at',
        'guide_id',
        'product_id'
    ];
}
