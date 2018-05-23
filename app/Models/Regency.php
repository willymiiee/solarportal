<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\Province;

class Regency extends Model
{
    protected $fillable = [
        'province_id',
        'name'
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
