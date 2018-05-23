<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class RegionController extends Controller
{
    public function getProvinces()
    {
        $data = Province::get();
        return response()->json($data);
    }

    public function getProvince($id)
    {
        $data = Province::find($id);
        return response()->json($data);
    }

    public function getRegencies($provinceId)
    {
        $data = Province::find($provinceId);
        return response()->json($data->regencies);
    }

    public function getRegency($provinceId, $regencyId)
    {
        $data = Regency::find($regencyId);
        return response()->json($data);
    }

    public function getDistricts($provinceId, $regencyId)
    {
        $data = Regency::find($regencyId);
        return response()->json($data->districts);
    }

    public function getDistrict($provinceId, $regencyId, $districtId)
    {
        $data = District::find($districtId);
        return response()->json($data);
    }

    public function getVillages($provinceId, $regencyId, $districtId)
    {
        $data = District::find($districtId);
        return response()->json($data->villages);
    }

    public function getVillage($provinceId, $regencyId, $districtId, $villageId)
    {
        $data = Village::find($villageId);
        return response()->json($data);
    }
}
