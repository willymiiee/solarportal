<?php

namespace App\Models;

use App\Models\Category;
use App\Models\CompanyMessage;
use App\Models\CompanyService;
use App\Models\User;
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
        'verified',
        // 'created_by',
        // 'updated_by',
        // 'deleted_by',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['avatar_url'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function services()
    {
        return $this->hasMany(CompanyService::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function messages()
    {
        return $this->hasMany(CompanyMessage::class);
    }

    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('storage/avatars/' . $this->avatar);
        }

        // // fallback default image for company
        // return ...;
    }
}
