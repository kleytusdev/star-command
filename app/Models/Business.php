<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Business extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    protected $fillable = [
        'ruc',
        'reason_social',
        'full_address',
        'address',
        'status',
        'condition',
        'ubigeous_sunat',
        'retention_agent',
        'ubigeous',
        'annexes',
        'user_id',
        'district_id',
    ];
}
