<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create([
            'payment_type' => 'VA',
            'name'          => 'BCA',
            'code'          => 'VIRTUAL_ACCOUNT_BCA',
            'description'   => '',
            'logo'          => 'https://cdn-activation.oss-ap-southeast-5.aliyuncs.com/common/logo/bank/bca.png',
            'steps'         => '',
            'fee'           => 3000,
            'status'        => 1
        ]);

        PaymentMethod::create([
            'payment_type' => 'VA',
            'name'          => 'MANDIRI',
            'code'          => 'VIRTUAL_ACCOUNT_BANK_MANDIRI',
            'description'   => '',
            'logo'          => 'https://cdn-activation.oss-ap-southeast-5.aliyuncs.com/common/logo/bank/mandiri.png',
            'steps'         => '',
            'fee'           => 3000,
            'status'        => 1
        ]);

        PaymentMethod::create([
            'payment_type'  => 'VA',
            'name'          => 'BSI',
            'code'          => 'VIRTUAL_ACCOUNT_BANK_SYARIAH_MANDIRI',
            'description'   => '',
            'logo'          => 'https://www.doku.com/assets/icon/payment/bsi.png',
            'steps'         => '',
            'fee'           => 3000,
            'status'        => 1
        ]);

        PaymentMethod::create([
            'payment_type'  => 'VA',
            'name'          => 'BRI',
            'code'          => 'VIRTUAL_ACCOUNT_BRI',
            'description'   => '',
            'logo'          => 'https://cdn-activation.oss-ap-southeast-5.aliyuncs.com/common/logo/bank/bri.png',
            'steps'         => '',
            'fee'           => 3000,
            'status'        => 1
        ]);

        PaymentMethod::create([
            'payment_type'  => 'VA',
            'name'          => 'BNI',
            'code'          => 'VIRTUAL_ACCOUNT_BNI',
            'description'   => '',
            'logo'          => 'https://cdn-activation.oss-ap-southeast-5.aliyuncs.com/common/logo/bank/bni.png',
            'steps'         => '',
            'fee'           => 3000,
            'status'        => 1
        ]);

        PaymentMethod::create([
            'payment_type'  => 'VA',
            'name'          => 'DOKU VA',
            'code'          => 'VIRTUAL_ACCOUNT_DOKU',
            'description'   => '',
            'logo'          => 'https://sandbox.doku.com/bo/assets/logodoku.png',
            'steps'         => '',
            'fee'           => 3000,
            'status'        => 1
        ]);

        PaymentMethod::create([
            'payment_type'  => 'VA',
            'name'          => 'PERMATA VA',
            'code'          => 'VIRTUAL_ACCOUNT_PERMATA',
            'description'   => '',
            'logo'          => 'https://cdn-activation.oss-ap-southeast-5.aliyuncs.com/common/logo/bank/permata.png',
            'steps'         => '',
            'fee'           => 3000,
            'status'        => 1
        ]);

        PaymentMethod::create([
            'payment_type' => 'VA',
            'name'          => 'CIMB',
            'code'          => 'VIRTUAL_ACCOUNT_CIMB',
            'description'   => '',
            'logo'          => 'https://cdn-activation.oss-ap-southeast-5.aliyuncs.com/common/logo/bank/cimb-niaga.png',
            'steps'         => '',
            'fee'           => 3000,
            'status'        => 1
        ]);

        PaymentMethod::create([
            'payment_type' => 'VA',
            'name'          => 'DANAMON',
            'code'          => 'VIRTUAL_ACCOUNT_DANAMON',
            'description'   => '',
            'logo'          => 'https://cdn-activation.oss-ap-southeast-5.aliyuncs.com/common/logo/internet-banking/danamon-online-banking.png',
            'steps'         => '',
            'fee'           => 3000,
            'status'        => 1
        ]);

        PaymentMethod::create([
            'payment_type' => 'CREDIT_CARD',
            'name'          => 'CREDIT CARD',
            'code'          => 'CREDIT_CARD',
            'description'   => '',
            'logo'          => 'https://www.pngmart.com/files/3/Major-Credit-Card-Logo-PNG-Image.png',
            'steps'         => '',
            'fee'           => 3000,
            'status'        => 1
        ]);

        PaymentMethod::create([
            'payment_type' => 'ONLINE_TO_OFFLINE',
            'name'          => 'ALFA GROUP',
            'code'          => 'ONLINE_TO_OFFLINE_ALFA',
            'description'   => '',
            'logo'          => 'https://cdn-activation.oss-ap-southeast-5.aliyuncs.com/common/logo/online-to-offline/alfa-group.png',
            'steps'         => '',
            'fee'           => 3000,
            'status'        => 1
        ]);

        PaymentMethod::create([
            'payment_type'  => 'EMONEY',
            'name'          => 'OVO',
            'code'          => 'EMONEY_OVO',
            'description'   => '',
            'logo'          => 'https://cdn-activation.oss-ap-southeast-5.aliyuncs.com/common/logo/e-money/ovo.png',
            'steps'         => '',
            'fee'           => 3000,
            'status'        => 1
        ]);

        PaymentMethod::create([
            'payment_type'  => 'EMONEY',
            'name'          => 'SHOPEEPAY',
            'code'          => 'EMONEY_SHOPEE_PAY',
            'description'   => '',
            'logo'          => 'https://cdn-activation.oss-ap-southeast-5.aliyuncs.com/common/logo/e-money/shopeepay.png',
            'steps'         => '',
            'fee'           => 3000,
            'status'        => 1
        ]);

        PaymentMethod::create([
            'payment_type'  => 'EMONEY',
            'name'          => 'DOKU WALLET',
            'code'          => 'EMONEY_DOKU',
            'description'   => '',
            'logo'          => 'https://sandbox.doku.com/bo/assets/logodoku.png',
            'steps'         => '',
            'fee'           => 3000,
            'status'        => 1
        ]);

        PaymentMethod::create([
            'payment_type'  => 'CREDIT',
            'name'          => 'AKULAKU',
            'code'          => 'PEER_TO_PEER_AKULAKU',
            'description'   => '',
            'logo'          => 'https://cdn-activation.oss-ap-southeast-5.aliyuncs.com/common/logo/peer-to-peer/akulaku.png',
            'steps'         => '',
            'fee'           => 3000,
            'status'        => 1
        ]);

        PaymentMethod::create([
            'payment_type'  => 'CREDIT',
            'name'          => 'KREDIVO',
            'code'          => 'PEER_TO_PEER_KREDIVO',
            'description'   => '',
            'logo'          => 'https://cdn-activation.oss-ap-southeast-5.aliyuncs.com/common/logo/peer-to-peer/kredivo.png',
            'steps'         => '',
            'fee'           => 3000,
            'status'        => 1
        ]);
    }
}
