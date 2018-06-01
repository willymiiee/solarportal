<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Quote;
use Config;

class QuoteController extends Controller
{
    public function postQuote(Request $request)
    {
        $data = $request->all();
        $data['bill'] = intval(preg_replace('/[^\d.]/', '', $data['bill']));
        $usePerDay = number_format($data['bill'] / (Config::get('constants.pln_tld') * 30), 1);
        $pvRequired = $usePerDay / Config::get('constants.sun_hour');
        $pvAllowed = min($pvRequired, $data['bill'] > 0 ? $data['bill']/1000 : 1000);
        $cost = $pvRequired * Config::get('constants.cost_kw');
        $roofArea = $pvAllowed * Config::get('constants.panel_area') * 1000;
        $saving = $pvAllowed * Config::get('constants.sun_hour') * Config::get('constants.pln_tld') * 30;

        $data = array_merge($data, [
            'use_per_day' => $usePerDay,
            'pv_required' => $pvRequired * 1000,
            'cost' => $cost,
            'saving' => $saving
        ]);

        Quote::create($data);

        return response()->json([
            'use_per_day' => $usePerDay,
            'pv_required' => $pvRequired * 1000,
            'pv_allowed' => $pvAllowed * 1000,
            'cost' => $cost,
            'roof_area' => $roofArea,
            'saving' => $saving
        ]);
    }
}
