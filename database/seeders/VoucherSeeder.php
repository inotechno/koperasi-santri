<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Voucher::create([
            'code' => 'ABS10000',
            'name' => 'Diskon Rp 10.000 Spesial Hari Raya',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum totam unde, illum perspiciatis sequi obcaecati nam nobis hic exercitationem laboriosam, incidunt aliquid est, earum autem libero voluptatem ducimus inventore sunt.',
            'desc_excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum totam unde.',
            'type_id' => 1,
            'uses' => NULL,
            'max_uses' => 10,
            'max_uses_user' => 3,
            'discount_nominal' => 10000,
            'discount_percentage' => NULL,
            'max_discount' => NULL,
            'minimum_order' => 50000,
            'start_at' => Carbon::now()->subDays(2),
            'expired_at' => Carbon::now()->addDays(3),
        ]);

        Voucher::create([
            'code' => 'ONGKIRASIK',
            'name' => 'Diskon Ongkir Maksimal 10.000',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum totam unde, illum perspiciatis sequi obcaecati nam nobis hic exercitationem laboriosam, incidunt aliquid est, earum autem libero voluptatem ducimus inventore sunt.',
            'desc_excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum totam unde.',
            'type_id' => 2,
            'uses' => NULL,
            'max_uses' => 10,
            'max_uses_user' => 3,
            'discount_nominal' => 10000,
            'discount_percentage' => NULL,
            'max_discount' => NULL,
            'minimum_order' => 50000,
            'start_at' => Carbon::now()->subDays(2),
            'expired_at' => Carbon::now()->addDays(3),
        ]);

        Voucher::create([
            'code' => 'DISKON10',
            'name' => 'Diskon Potongan Pembelian 10%',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum totam unde, illum perspiciatis sequi obcaecati nam nobis hic exercitationem laboriosam, incidunt aliquid est, earum autem libero voluptatem ducimus inventore sunt.',
            'desc_excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum totam unde.',
            'type_id' => 1,
            'uses' => NULL,
            'max_uses' => 10,
            'max_uses_user' => 3,
            'discount_nominal' => NULL,
            'discount_percentage' => 10,
            'max_discount' => 20000,
            'minimum_order' => 50000,
            'start_at' => Carbon::now()->subDays(2),
            'expired_at' => Carbon::now()->addDays(3),
        ]);
    }
}
