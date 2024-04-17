<?php

namespace Database\Seeders;

use App\Models\VoucherType;
use Illuminate\Database\Seeder;

class VoucherTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VoucherType::create([
            'name' => 'Potongan Harga',
            'slug' => 'potongan_harga'
        ]);

        VoucherType::create([
            'name' => 'Potongan Ongkir',
            'slug' => 'potongan_ongkir'
        ]);
    }
}
