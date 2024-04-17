<?php

namespace Database\Seeders;

use App\Models\UserAddress;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserAddress::create([
            'user_id' => 1,
            'subdistrict_id' => 5573,
            'name' => 'Ahmad Fatoni',
            'phone' => '089676490971',
            'address_line1' => 'Jl. Raya Cilegon Km. 03',
            'address_line2' => 'RT.02/11',
            'primary_address' => NULL,
            'return_address' => NULL,
            'store_address' => 'on',
        ]);

        UserAddress::create([
            'user_id' => 2,
            'subdistrict_id' => 2105,
            'name' => 'AFStore',
            'phone' => '08815925920',
            'address_line1' => 'Komplek duta mas fatmawati',
            'address_line2' => 'Blok B6',
            'primary_address' => 'on',
            'return_address' => NULL,
            'store_address' => NULL,
        ]);
    }
}
