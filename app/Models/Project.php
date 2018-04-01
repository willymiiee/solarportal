<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'installed_capacity', 'type_installation', 'type_connection', 'location', 'is_location_allow_public', 'is_involved_installation', 'image', 'brand', 'capacity_panel', 'amount', 'province'
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
}
