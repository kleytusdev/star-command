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

    public function users()
    {
        return $this->hasMany(User::class, 'id', 'created_by');
    }

    protected $fillable = [
        'discount',
        'igv',
        'subtotal',
        'total',
        'payment_method',
        'client_id',
        'created_by',
    ];
}
