<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntryGuide extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    protected $fillable = [
        'status',
        'quantity',
        'unit_price',
        'total',
        'guide_id',
        'product_id'
    ];
}
