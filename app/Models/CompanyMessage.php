<?php

namespace App\Models;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CompanyMessage extends Model
{
    protected $table = 'company_messages';

    protected $fillable = ['company_id', 'user_id', 'message'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
