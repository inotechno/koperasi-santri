<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Store;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use Fstarkcyber\RajaOngkir\Facades\RajaOngkir;

class OngkosKirimController extends Controller
{
    public function check(Request $request)
    {
        // dd($request->query);
        $subdistrict = Subdistrict::where('id', $request->origin)->first();

        // $cost = array(
        //     'origin'        => $subdistrict->city_id, // ID kota/kabupaten asal
        //     'originType' => "city",
        //     'destination'   => $request->destination, // ID kota/kabupaten tujuan
        //     'destinationType' => "subdistrict",
        //     'weight'        => $request->weight, // berat barang dalam gram
        //     'courier'       => $request->courier
        // );

        try {
            $cost = RajaOngkir::ongkosKirim([
                'origin'        => $subdistrict->city_id, // ID kota/kabupaten asal
                'originType' => "city",
                'destination'   => $request->destination, // ID kota/kabupaten tujuan
                'destinationType' => "subdistrict",
                'weight'        => $request->weight, // berat barang dalam gram
                'courier'       => $request->courier // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
            ])->get();

            return response()->json($cost);
        } catch (\Throwable $th) {
            return response()->json($th);
        }
    }
}
