<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }

    protected $fillable = [
        'discount',
        'igv',
        'subtotal',
        'total',
        'status',
        'payment_method',
        'client_id',
    ];

    // protected $casts = [
    //   'status' => SaleStatusEnum::class,
    //   'payment_method' => SalePaymentMethodEnum::class
    // ];
}
