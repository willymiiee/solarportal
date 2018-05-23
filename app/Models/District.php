<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Regency;
use App\Models\Village;

class District extends Model
{
    protected $fillable = [
        'regency_id',
        'name'
    ];

    public function villages()
    {
        return $this->hasMany(Village::class);
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }
}
