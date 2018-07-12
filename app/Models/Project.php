<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'installed_capacity', 'type_installation', 'type_connection', 'location', 'is_location_allow_public', 'is_involved_installation', 'image', 'status', 'is_shown', 'brand', 'capacity_panel', 'amount', 'province'
    ];

    protected $appends = ['transform_installed_capacity'];

    /**
     * Statuses of Projects
     */
    const STATUS_PENDING = 0;
    const STATUS_ACCEPTED = 1;
    const STATUS_REJECTED = 1;

    const STATUS = [

    ];

    const DROPDOWN_TYPE_INSTALLATION = [
        'Surya Atap (Rooftop)' => 'Surya Atap (Rooftop)',
        'Instalasi di atas tanah (Ground)' => 'Instalasi di atas tanah (Ground)',
        'Lain lain' => 'Lain lain',
    ];

    const DROPDOWN_TYPE_CONNECTION = [
        'Grid tie/terhubung dengan PLN' => 'Grid tie/terhubung dengan PLN',
        'Grid tie hibrid dengan Baterai' => 'Grid tie hibrid dengan Baterai',
        'Off grid atau di belakang meter' => 'Off grid atau di belakang meter',
        'Off grid dengan Baterai' => 'Off grid dengan Baterai',
        'Lain-lain' => 'Lain-lain',
    ];

    const META_ATTRIBUTES = [
        'infoPanel_brand' => 'string',
        'infoPanel_capacity' => 'integer',
        'infoPanel_amount' => 'float',

        'inverter_brand' => 'string',
        'inverter_type' => 'string',
        'inverter_capacity' => 'integer',

        'solarCharge_brand' => 'string',
        'solarCharge_type' => 'string',

        'battery_brand' => 'string',
        'battery_capacity' => 'integer',
        'battery_amount' => 'float',

        'other_info' => 'string',

        'meterExim_waiting_time' => 'string',
        'meterExim_pln_rayon' => 'string',
        'meterExim_experience_pln' => 'string',
    ];

    public function metas()
    {
        return $this->hasMany(Projectmeta::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    /**
     * Get project customers
     * 
     * @return \App\Models\User
     */
    public function customers()
    {
        return $this->belongsToMany(User::class)->withPivot('unregistered_company_name');
    }

    public function getTransformInstalledCapacityAttribute()
    {
        if ($ic = $this->attributes['installed_capacity']) {
            return $ic / 1000 .' kWp';
        }

        return 0;
    }

    /**
     * [getImageAttribute description]
     * @return array|null
     */
    public function getImageAttribute()
    {
        if (empty($this->attributes['image'])) {
            return null;
        }

        return explode(',', $this->attributes['image']);
    }

    public function getImageForEdit()
    {
        $result = [];
        $images = $this->image;
        if (!empty($images)) {
            foreach ($images as $key => $img) {
                if ($img) {
                    array_push($result, [
                        'path' => $img,
                        'url' => getFromS3($img),
                    ]);
                }
            }
            return $result;
        }
    }

    public function setImageAttribute($value)
    {
        $transformed = $value;
        if (is_array($value)) {
            $transformed = implode(',', $value);
        }

        $this->attributes['image'] = $transformed;
    }

    public function scopeFilterableQuery($q)
    {
        $sort = request('sort', 'latest');
        $query = $q->when($sort, function ($b) use ($sort) {
            if (!in_array($sort, ['latest', 'oldest'])) {
                return $b;
            }
            return $sort == 'latest' ? $b->latest() : $b->oldest();
        });
    }
}
