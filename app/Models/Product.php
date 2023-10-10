<?php

namespace App\Models;

use App\Enums\ProductStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $fillable = [
        'name',
        'price',
        'brand',
        'model',
        'stock',
        'status',
        'qr_code',
        'uri_photo',
        'warehouse_id',
        'category_id'
    ];

    protected $casts = [
        'status' => ProductStatusEnum::class
    ];
}
