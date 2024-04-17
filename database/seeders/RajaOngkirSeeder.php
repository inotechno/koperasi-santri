<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use App\Models\Subdistrict;
use Illuminate\Database\Seeder;
use Fstarkcyber\RajaOngkir\Facades\RajaOngkir;

class RajaOngkirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftarProvinsi = RajaOngkir::provinsi()->all();
        foreach ($daftarProvinsi as $provinceRow) {
            Province::create([
                'id' => $provinceRow['province_id'],
                'province_name'        => $provinceRow['province'],
            ]);
        }

        $daftarKota = RajaOngkir::kota()->all();
        foreach ($daftarKota as $cityRow) {
            City::create([
                'id'       => $cityRow['city_id'],
                'province_id'   => $cityRow['province_id'],
                'city_name'     => $cityRow['type'] . ' ' . $cityRow['city_name'],
            ]);
            $daftarKecamatan = RajaOngkir::kecamatan()->dariKota($cityRow['city_id'])->get();
            foreach ($daftarKecamatan as $subd) {
                Subdistrict::create([
                    'id'              => $subd['subdistrict_id'],
                    'city_id'              => $cityRow['city_id'],
                    'subdistrict_name'      => $subd['subdistrict_name']
                ]);
            }
        }
    }
}
