<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projectmeta extends Model
{
    protected $fillable = [

    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
