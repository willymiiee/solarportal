<?php

namespace App\Models;

use App\Models\Company;
use App\Models\CompanyMessage;
use App\Models\Quote;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type', 'confirmation_code', 'gender', 'phone', 'main_domicile', 'address', 'lost_password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at', 'confirmed_at',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['avatar_url'];

    public function companies()
    {
        return $this->belongsToMany(Company::class);
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

        // fallback default image based on it gender
        return $this->gender == 'm' ? asset('img/male.png') : asset('img/female.png');
    }

    public function addCompany($company_id)
    {
        // check for existance of company
        $company = Company::find($company_id);
        if (!$company) {
            return false;
        }

        // if user already joined that company, we do nothing
        if ($this->companies->find($company_id)) {
            return true;
        }

        $this->companies()->attach($company->id);
        return true;
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
}
