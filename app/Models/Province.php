<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Regency;

class Province extends Model
{
    protected $fillable = [
        'name'
    ];

    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }
}
