<?php

namespace App\Http\Controllers\Api;

use App\Models\Subdistrict;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\OngkosKirimResource;
use Fstarkcyber\RajaOngkir\Facades\RajaOngkir;

class OngkosKirimController extends BaseController
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

            return $this->sendResponse(OngkosKirimResource::collection($cost), 'Ongkos kirim retrieved successfully');
        } catch (\Exception $th) {
            return $this->sendError('Failed', ['error' => $th->getMessage()]);
        }
    }
}
