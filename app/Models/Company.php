<?php

namespace App\Models;

use App\Models\CompanyService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'type',
        'email',
        'domicile',
        'address',
        'phone',
        'phone_2',
        'website',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function services()
    {
        return $this->hasMany(CompanyService::class);
    }
}
