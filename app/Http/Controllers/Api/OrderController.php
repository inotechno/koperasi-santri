<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Models\PaymentDetail;
use App\Models\DeliveryDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Royryando\Duitku\Facades\Duitku;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\OrderResource;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = Order::with('paymentdetail', 'deliverydetail', 'user', 'store', 'orderitem')->where('user_id', $request->user_id)->get();
        return $this->sendResponse(OrderResource::collection($order), 'Transaksi retrieved successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function methods(Request $request)
    {
        // dd(intval($request->nominal));
        try {
            $duitku = Duitku::paymentMethods(intval($request->nominal));
            return $this->sendResponse($duitku, 'Payment Methods retrieved successfully');
        } catch (\Exception $th) {
            return $this->sendError('Failed', ['error' => $th->getMessage()]);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $order_id = date('YmdHis');
        $id = $request->user_id;
        $name = $request->name;
        $email = $request->email;
        $ongkir = $request->ongkir;
        $ppn = intval($request->ppn);
        $fee = $request->fee;
        $grand_total = intval($request->grand_total);
        $payment_method = $request->payment_method;
        $payment_name = $request->payment_name;
        $address_from = $request->address_from;
        $address_to = $request->address_to;
        $expedition = $request->expedition;
        $expedition_service = $request->expedition_service;
        $total_weight = $request->total_weight;
        $product_name = implode('|', $request->product_name);

        $store = UserAddress::with('user')->with('user.store')->where('id', $address_from)->first();
        // dd($store->user->store->id);
        $cart = Cart::with('product')->whereIn('id', $request->cart_id)->get();

        try {
            $duitku = Duitku::createInvoice($order_id, (intval($grand_total) - $fee), $payment_method, $product_name, $name, $email, 120);

            $reference = $duitku['reference'];
            $va_number = $duitku['va_number'];
            $payment_url = $duitku['payment_url'];

            // dd($duitku['reference']);
            $data['deliveryDetail'] = DeliveryDetail::create([
                'address_to' => $address_to,
                'address_from' => $address_from,
                'expedition' => $expedition,
                'expedition_service' => $expedition_service,
                'total_weight' => $total_weight,
                'shipping_cost' => $ongkir
            ]);

            $data['paymentDetail'] = PaymentDetail::create([
                'payment_code' => $payment_method,
                'payment_name' => $payment_name,
                'va_number'     => $va_number,
                'payment_url'   => $payment_url,
                'fee'           => $fee,
                'status_code'   => 201,
                'expiration_date'   => Carbon::now()->addMinutes(120)
            ]);

            // dd(DB::getQueryLog());
            $data['order'] = Order::create([
                'order_number' => $order_id,
                'reference_number' => $reference,
                'store_id'       => $store->user->store->id,
                'user_id'       => $id,
                'ppn'           => $ppn,
                'grand_total'   => $grand_total,
                'payment_detail_id' => $data['paymentDetail']->id,
                'delivery_detail_id'    => $data['deliveryDetail']->id,
            ]);

            // dd($data['order']);
            foreach ($cart as $crt) {
                $crt->checkout_at = date('Y-m-d H:i:s');
                $crt->save();

                $crt->product->update(['stock' => $crt->product->stock - $crt->quantity]);

                $data['orderItem'][] = OrderItem::create([
                    'order_id' => $data['order']->id,
                    'price' => $crt->product->price,
                    'product_id' => $crt->product_id,
                    'quantity' => $crt->quantity
                ]);
            }
            // dd($data);
            return $this->sendResponse(new OrderResource($data), 'Order retrieved successfully');
        } catch (\Exception $th) {
            return $this->sendError('Failed', ['error' => $th->getMessage()]);
        }
        // dd($cart);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with('paymentdetail', 'deliverydetail', 'user', 'store', 'orderitem')->find($id);

        if (is_null($order)) {
            return $this->sendError('Order not found.');
        }

        return $this->sendResponse(new OrderResource($order), 'Order retrieved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
