<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use Config;

class QuoteController extends Controller
{
    public function postQuote(Request $request)
    {
        $data = $request->all();
        $usePerDay = number_format(intval(preg_replace('/[^\d.]/', '', $data['tagihan'])) / (Config::get('constants.pln_tld') * 30), 1);
        $pvRequired = $usePerDay / Config::get('constants.sun_hour');
        $pvAllowed = min($pvRequired, $data['kapasitas']/1000);
        $cost = $pvRequired * Config::get('constants.cost_kw');
        $roofArea = $pvAllowed * Config::get('constants.panel_area') * 1000;
        $saving = $pvAllowed * Config::get('constants.sun_hour') * Config::get('constants.pln_tld') * 30;
        return [
            'use_per_day' => $usePerDay,
            'pv_required' => $pvRequired * 1000,
            'pv_allowed' => $pvAllowed * 1000,
            'cost' => $cost,
            'roof_area' => $roofArea,
            'saving' => $saving
        ];
    }
}
