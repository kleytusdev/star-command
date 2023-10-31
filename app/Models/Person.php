<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function client()
    {
        return $this->morphOne(Client::class, "clientable");
    }

    public function district()
    {
      return $this->belongsTo(District::class);
    }

    protected $fillable = [
        "document_type",
        "document_number",
        "name",
        "full_name",
        "paternal_surname",
        "maternal_surname",
        "phone_number",
        "district_id",
    ];
}
