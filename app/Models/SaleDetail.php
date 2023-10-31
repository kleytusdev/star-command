<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    protected $fillable = [
        'quantity',
        'unit_price',
        'total',
        'sale_id',
        'product_id'
    ];
}
