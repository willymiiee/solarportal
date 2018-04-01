<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projectmeta extends Model
{
    protected $fillable = ['key', 'type', 'value'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'value' => 'dynamic',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Override the getCastType to make it dynamically
     *
     * @param  string $key
     * @return string
     */
    protected function getCastType($key)
    {
        if ($key == 'value' && !empty($this->type)) {
            return $this->type;
        }

        return parent::getCastType($key);
    }
}
