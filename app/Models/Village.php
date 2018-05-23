<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class Village extends Model
{
    protected $fillable = [
        'district_id',
        'name'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
