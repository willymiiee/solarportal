<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function pages()
    {
        return $this->belongsToMany('App\Models\Page')
            ->wherePivot('item_type', 'page')
            ->withTimestamps();
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post')
            ->wherePivot('item_type', 'post')
            ->withTimestamps();
    }
}
