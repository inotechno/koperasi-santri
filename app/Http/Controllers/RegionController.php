<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\Subdistrict;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function province(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $province = Province::orderby('province_name', 'asc')->select('id', 'province_name')->limit(5)->get();
        } else {
            $province = Province::orderby('province_name', 'asc')->select('id', 'province_name')->where('province_name', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($province as $p) {
            $response[] = array(
                "id" => $p->id,
                "text" => $p->province_name
            );
        }

        return response()->json($response);
    }

    public function city(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $city = City::orderby('city_name', 'asc')->select('id', 'city_name')->where("province_id", $request->province_id)->limit(5)->get();
        } else {
            $city = City::orderby('city_name', 'asc')->select('id', 'city_name')->where("province_id", $request->province_id)->where('city_name', 'like', '%' . $search . '%')->limit(5)->get();
        }
        // dd($city);

        $response = array();
        foreach ($city as $p) {
            $response[] = array(
                "id" => $p->id,
                "text" => $p->city_name
            );
        }

        return response()->json($response);
    }

    public function subdistrict(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $subdistrict = Subdistrict::orderby('subdistrict_name', 'asc')->select('id', 'subdistrict_name')->where("city_id", $request->city_id)->limit(5)->get();
        } else {
            $subdistrict = Subdistrict::orderby('subdistrict_name', 'asc')->select('id', 'subdistrict_name')->where("city_id", $request->city_id)->where('subdistrict_name', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($subdistrict as $p) {
            $response[] = array(
                "id" => $p->id,
                "text" => $p->subdistrict_name
            );
        }

        return response()->json($response);
    }
}
