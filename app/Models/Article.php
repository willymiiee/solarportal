<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'slug', 'type', 'published', 'is_home', 'label', 'created_by', 'updated_by', 'deleted_by'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function images()
    {
        return $this->belongsToMany('App\Models\Image', 'article_images');
    }

    public function label()
    {
        return $this->belongsToMany('App\Models\Label', 'article_labels');
    }
}
