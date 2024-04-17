<?php

namespace Database\Seeders;

use App\Models\DeliveryDetail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentDetail;
use App\Models\Rating;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryDetail = [
            [
                'id' => 1,
                'address_to' => 2,
                'address_from' => 1,
                'expedition' => 'jnt',
                'expedition_service' => 'EZ',
                'resi_number' => 'JP6153290482',
                'total_weight' => 400,
                'shipping_cost' => 9000,
                'created_at' => '2023-05-03 15:37:44',
                'updated_at' => '2023-05-03 15:55:38'
            ],
            [
                'id' => 2,
                'address_to' => 2,
                'address_from' => 1,
                'expedition' => 'jnt',
                'expedition_service' => 'EZ',
                'resi_number' => 'JP5740595163',
                'total_weight' => 50,
                'shipping_cost' => 9000,
                'created_at' => '2023-05-04 10:44:14',
                'updated_at' => '2023-05-04 13:32:17'
            ]
        ];

        $orderItems = [
            [
                'id' => 2,
                'order_id' => 1,
                'product_id' => 7,
                'price' => 115000,
                'quantity' => 1,
                'created_at' => '2023-05-03 15:37:44',
                'updated_at' => '2023-05-03 15:37:44'
            ],
            [
                'id' => 6,
                'order_id' => 2,
                'product_id' => 5,
                'price' => 35000,
                'quantity' => 1,
                'created_at' => '2023-05-04 10:44:14',
                'updated_at' => '2023-05-04 10:44:14'
            ]
        ];

        $orders = [
            [
                'id' => 1,
                'order_number' => '20230503153728',
                'reference_number' => 'DS1352223V3S4U2BHONWO3P5',
                'store_id' => 1,
                'user_id' => 2,
                'ppn' => 13970,
                'grand_total' => 140970,
                'payment_detail_id' => 1,
                'delivery_detail_id' => 1,
                'cancel_time' => NULL,
                'process_time' => '2023-05-03 15:46:16',
                'shipping_time' => '2023-05-03 15:55:38',
                'accepted_time' => '2023-05-03 16:04:37',
                'created_at' => '2023-05-03 15:37:44',
                'updated_at' => '2023-05-03 16:04:37'
            ],
            [
                'id' => 2,
                'order_number' => '20230504104413',
                'reference_number' => 'DS1352223QSZXHPYS3NMFCO7',
                'store_id' => 1,
                'user_id' => 2,
                'ppn' => 5170,
                'grand_total' => 52170,
                'payment_detail_id' => 2,
                'delivery_detail_id' => 2,
                'cancel_time' => NULL,
                'process_time' => '2023-05-04 10:44:49',
                'shipping_time' => '2023-05-04 13:32:17',
                'accepted_time' => '2023-05-04 13:52:43',
                'created_at' => '2023-05-04 10:44:14',
                'updated_at' => '2023-05-04 13:52:43'
            ]
        ];

        $paymendDetails = [
            [
                'id' => 1,
                'payment_code' => 'I1',
                'payment_name' => 'BNI VA',
                'va_number' => '9880024805856609',
                'payment_url' => 'https://sandbox.duitku.com/topup/topupdirectv2.aspx?ref=I123DAVBGA8SR4MKTSB',
                'qr_string' => NULL,
                'status_code' => 200,
                'fee' => 3000,
                'expiration_date' => '2023-05-04 12:35:53',
                'paid_date' => NULL,
                'created_at' => '2023-05-04 10:35:53',
                'updated_at' => '2023-05-04 10:35:53'
            ],
            [
                'id' => 2,
                'payment_code' => 'I1',
                'payment_name' => 'BNI VA',
                'va_number' => '9880024807348359',
                'payment_url' => 'https://sandbox.duitku.com/topup/topupdirectv2.aspx?ref=I123T2SK3GP08SV0EZG',
                'qr_string' => NULL,
                'status_code' => 200,
                'fee' => 3000,
                'expiration_date' => '2023-05-04 12:44:14',
                'paid_date' => '2023-05-04 10:44:29',
                'created_at' => '2023-05-04 10:44:14',
                'updated_at' => '2023-05-04 10:44:29'
            ]
        ];

        $ratings = [
            [
                'order_id' => 1,
                'product_id' => 7,
                'nilai'     => 4,
                'store_id'     => 1,
                'catatan'   => 'Barang lumayan bagus',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'order_id' => 2,
                'product_id' => 5,
                'nilai'     => 5,
                'store_id'     => 1,
                'catatan'   => 'bagus, harga murah meriah, anak saya senang',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];

        DeliveryDetail::insert($deliveryDetail);
        PaymentDetail::insert($paymendDetails);
        Order::insert($orders);
        OrderItem::insert($orderItems);
        Rating::insert($ratings);
    }
}
