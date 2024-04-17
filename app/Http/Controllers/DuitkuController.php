<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Royryando\Duitku\Enums\DuitkuCallbackCode;
use App\Models\Order;

class DuitkuController extends Controller
{
    protected function paymentCallback(Request $request)
    {
        try {
            $merchantCode = config('duitku.merchant_code');
            $apiKey = config('duitku.api_key');
            $amount = $request->input('amount');
            $merchantOrderId = $request->input('merchantOrderId');
            $productDetail = $request->input('productDetail');
            $additionalParam = $request->input('additionalParam');
            $paymentMethod = $request->input('paymentCode');
            $resultCode = $request->input('resultCode');
            $merchantUserId = $request->input('merchantUserId');
            $reference = $request->input('reference');
            $signature = $request->input('signature');
            $spUserHash = $request->input('spUserHash'); // Shopee only

            if (!empty($merchantCode) && !empty($amount) && !empty($merchantOrderId) && !empty($signature)) {
                $params = $merchantCode . $amount . $merchantOrderId . $apiKey;
                $calcSignature = md5($params);

                if ($signature == $calcSignature) {
                    if ($resultCode == DuitkuCallbackCode::SUCCESS) {
                        // SUCCESS
                        // Payment success

                        // Storage::disk('local')->put('log_callback.txt', 'Sukses '
                        //     . $merchantCode . ' | '
                        //     . $apiKey . ' | '
                        //     . $amount . ' | '
                        //     . $merchantOrderId . ' | '
                        //     . $productDetail . ' | '
                        //     . $additionalParam . ' | '
                        //     . $paymentMethod . ' | '
                        //     . $resultCode . ' | '
                        //     . $reference . ' | '
                        //     . $signature . ' | '
                        //     . $spUserHash . ' | *\r\n\r\n');

                        $this->onPaymentSuccess(
                            $merchantOrderId,
                            $productDetail,
                            $amount,
                            $paymentMethod,
                            $spUserHash,
                            $reference,
                            $additionalParam
                        );
                    } else {
                        // FAILED
                        // Payment failed or expired

                        // Storage::disk('local')->put('log_callback.txt', 'Failed '
                        //     . $merchantCode . ' | '
                        //     . $apiKey . ' | '
                        //     . $amount . ' | '
                        //     . $merchantOrderId . ' | '
                        //     . $productDetail . ' | '
                        //     . $additionalParam . ' | '
                        //     . $paymentMethod . ' | '
                        //     . $resultCode . ' | '
                        //     . $reference . ' | '
                        //     . $signature . ' | '
                        //     . $spUserHash . ' | *\r\n\r\n');

                        $this->onPaymentFailed(
                            $merchantOrderId,
                            $productDetail,
                            $amount,
                            $paymentMethod,
                            $spUserHash,
                            $reference,
                            $additionalParam
                        );
                    }
                    return response()->json([
                        'success' => true,
                        'message' => 'Request processed',
                    ])->setStatusCode(200);
                } else {
                    // FAILED
                    // Bad signature

                    // Storage::disk('local')->put('log_callback.txt', 'Bad Signature '
                    //     . $merchantCode . ' | '
                    //     . $apiKey . ' | '
                    //     . $amount . ' | '
                    //     . $merchantOrderId . ' | '
                    //     . $productDetail . ' | '
                    //     . $additionalParam . ' | '
                    //     . $paymentMethod . ' | '
                    //     . $resultCode . ' | '
                    //     . $reference . ' | '
                    //     . $signature . ' | '
                    //     . $spUserHash . ' | *\r\n\r\n');

                    return response()->json([
                        'success' => false,
                        'message' => 'Bad signature',
                    ])->setStatusCode(400);
                }
            } else {
                // FAILED
                // Bad parameter
                // Storage::disk('local')->put('log_callback.txt', 'Bad Parameter '
                //     . $merchantCode . ' | '
                //     . $apiKey . ' | '
                //     . $amount . ' | '
                //     . $merchantOrderId . ' | '
                //     . $productDetail . ' | '
                //     . $additionalParam . ' | '
                //     . $paymentMethod . ' | '
                //     . $resultCode . ' | '
                //     . $reference . ' | '
                //     . $signature . ' | '
                //     . $spUserHash . ' | *\r\n\r\n');

                return response()->json([
                    'success' => false,
                    'message' => 'Bad parameter',
                ])->setStatusCode(400);
            }
        } catch (\Exception $ex) {
            return response()
                ->json([
                    'success' => false,
                    'message' => $ex->getMessage(),
                ])
                ->setStatusCode(500);
        }
    }

    /**
     * @param string $orderId Nomor transaksi dari merchant
     * @param string $productDetail Keterangan detil produk
     * @param int $amount Jumlah nominal transaksi
     * @param string $paymentCode Metode Pembayaran
     * @param string|null $shopeeUserHash Jika menggunakan ShopeePay
     * @param string $reference Nomor referensi transaksi dari DuitkuProcessor
     * @param string|null $additionalParam
     */
    protected function onPaymentSuccess(
        string $orderId,
        string $productDetail,
        int $amount,
        string $paymentCode,
        ?string $shopeeUserHash,
        string $reference,
        ?string $additionalParam
    ): void {
        $order = Order::with('paymentdetail')->where('order_number', $orderId)->first();
        $order->paymentdetail()->update(['status_code' => 200, 'paid_date' => date('Y-m-d H:i:s')]);
    }

    /**
     * @param string $orderId Nomor transaksi dari merchant
     * @param string $productDetail Keterangan detil produk
     * @param int $amount Jumlah nominal transaksi
     * @param string $paymentCode Metode Pembayaran
     * @param string|null $shopeeUserHash Jika menggunakan ShopeePay
     * @param string $reference Nomor referensi transaksi dari DuitkuProcessor
     * @param string|null $additionalParam
     */
    protected function onPaymentFailed(
        string $orderId,
        string $productDetail,
        int $amount,
        string $paymentCode,
        ?string $shopeeUserHash,
        string $reference,
        ?string $additionalParam
    ): void {
        $order = Order::with('paymentdetail')->where('order_number', $orderId)->first();
        $order->paymentdetail()->update(['status_code' => 203]);
    }
}
